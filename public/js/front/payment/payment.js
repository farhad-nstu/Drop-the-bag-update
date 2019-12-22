var conv = [];
conv["CAD"] = 0.663168246;
conv["USD"] = 0.847759372;
conv["GBP"] = 1.12972414;
conv["AUD"] = 0.650036454;
conv["BRL"] = 0.255599451;

function convertToEUR(amount, currency) {
    if (currency in conv) {
        return conv[currency] * amount;
    }
    return amount;
}

function removeCookie() {

    var ac = Cookies.get('ac');
    var acc = Cookies.get('ac');
    var subac = Cookies.get('subac');

    var hostName = window.location.host;
    console.log('removeCookie', hostName, ac, subac);
    ac && Cookies.remove('ac', { domain: '.' + hostName });
    acc && Cookies.remove('ac', { domain: '.' + hostName });
    subac && Cookies.remove('subac', { domain: '.' + hostName });
}

$(document).ready(function () {
    'use strict';

    if (Handlebars) {

        Handlebars.registerHelper('dateHumanReadable', function (datetime) {
            return moment.utc(datetime.replace(/Z|[\+\-]\d\d:\d\d/, '')).format("lll");
        });
        Handlebars.registerHelper('money', function (symbol, amount) {
            var amountString = '0';
            if (amount > 0) {
                var amountF = amount / 100;
                amountString = amountF.toFixed(2);
            }

            return new Handlebars.SafeString(symbol + '' + amountString);
        });
        Handlebars.registerHelper('ifEqCond', function (v1, v2, options) {
            if (v1 === v2) {
                return options.fn(this);
            }
            return options.inverse(this);
        });
    }

    if (window.ga === undefined) {
        window.ga = function () {};
    }

    var stripe = Stripe(stripeToken);

    if (customerEmail !== "" && stripeCustomerId !== "") {
        $("#payment-email").val(customerEmail).attr("readonly", true);

        if (cards !== undefined && cards !== null && cards.length) {
            var currentCard = cards[0];
            var cardString = "**** " + currentCard.cardLast4 + " " + ("0" + currentCard.cardExpiryMonth).slice(-2) + "/" + currentCard.cardExpiryYear.toString().slice(-2);
            var paymentMethodId = currentCard.paymentMethodId;
            // $("#payment-stripe-saved").val(cardString);
            $("#stripe-saved").removeClass("hidden");
        }
    }

    function registerElements(elements, bagbnbName) {
        var formClass = '.' + bagbnbName;
        var bagbnb = document.querySelector(formClass);
        var form = bagbnb.querySelector('#payment-form');
        var couponForm = bagbnb.querySelector('#collapseCoupon');
        var resetButton = bagbnb.querySelector('a.reset');
        var error = form.querySelector('#error');

        if ($("#success-coupon-template").length) {
            var couponTemplate = Handlebars.compile($("#success-coupon-template").html());
        }

        if ($("#success-template").length) {
            var template = Handlebars.compile($("#success-template").html());
        }
        if ($("button.pay").length) {
            var paymentButtonTemplate = Handlebars.compile($("#update-pay-button-template").html());
        }

        $('#couponButton').on('click', function () {
            var $btn = $(this).button('loading');
            addCoupon();
        });

        function onSuccessCoupon(data) {
            cart = data;
            $('#couponButton').button('reset');
            $('.promocode-wrapper').addClass('disabled');
            // $('#collapseCoupon').collapse('hide');
            addAlertOnBottom("OK", data.totals.discount.description + couponHasBeenAppliedToTheCart, "alert-success");
            $("#template-coupon-content").html(couponTemplate(data));
            $("button.pay").text(paymentButtonTemplate(data));
        }

        function onFailureCoupon(code, data) {
            $('#couponButton').button('reset');
            addAlertOnBottom(code, data, "alert-danger");
        }

        function addCoupon() {
            // Disable all inputs.
            if (cart === undefined) {
                onFailureCoupon("problem applying coupon");
                return;
            }
            var couponCode = {
                "couponCode": $("#payment-coupon").val()
            };

            console.log(couponCode);
            var url = apiHost + window.__bagbnbLocale + "/cart/" + cart.id + "/coupon";
            doCharge(url, couponCode, onSuccessCoupon, onFailureCoupon);
        }

        function doCharge(url, payload, success, error) {

            var jqxhr = $.ajax({
                method: "POST",
                url: url + debugUrl,
                data: JSON.stringify(payload),
                contentType: 'application/json; charset=utf-8',
                headers: createHeaders(),
                dataType: "json"
            });

            jqxhr.done(function (data) {
                if (data['customer_token'] != undefined && Cookies.get('TOKEN') == undefined) {
                    Cookies.set('TOKEN', data['customer_token']);
                }
                success(data);
            });

            jqxhr.fail(function (data) {
                if (data.responseJSON && data.responseJSON.error) {
                    var errortitle = data.responseJSON.code;
                    if (errorTitle === undefined) {
                        errorTitle = "";
                    }
                    error(data.statusText + " " + errorTitle, data.responseJSON.error);
                } else {
                    var errorTitle = data.error;
                    if (errorTitle === undefined) {
                        errorTitle = "";
                    }

                    error(data.statusText, errorTitle + ": Problem applying operation, please retry.");
                }
            });
        }

        function createHeaders() {
            var h = {
                "Authorization": "Basic YXBpOkQySzNhMlJI",
            };

            if (token !== undefined && token != null && token !== "") {
                h["X-TOKEN"]=token;
            }

            return h;
        }

        function doPaymentIntentCharge(url, payload, success, error) {

            var jqxhr = $.ajax({
                method: "POST",
                url: url + debugUrl,
                data: JSON.stringify(payload),
                contentType: 'application/json; charset=utf-8',
                headers: createHeaders(),
                dataType: "json"
            });

            jqxhr.done(function (data) {
                if (data['customer_token'] != undefined && Cookies.get('TOKEN') == undefined) {
                    Cookies.set('TOKEN', data['customer_token']);
                }
                success(data);
            });

            jqxhr.fail(function (data) {
                if (data.responseJSON && data.responseJSON.error) {
                    if (data.responseJSON.paymentIntentClientSecret !== undefined) {
                        //we need to handle 3dsecure challenge
                        stripe.handleCardAction(data.responseJSON.paymentIntentClientSecret).then(function (result) {
                            if (result.error) {
                                var errorTitle = result.error.message;
                                if (errorTitle === undefined) {
                                    errorTitle = "";
                                }

                                error("Problem applying operation, please retry.", errorTitle);
                            } else {
                                payload.stripePaymentIntent = result.paymentIntent.id;
                                doPaymentIntentCharge(url, payload, success, error);
                            }
                        });
                        return;
                    }
                    var errorTitle = data.responseJSON.code;
                    if (errorTitle === undefined) {
                        errorTitle = "";
                    }

                    error(data.statusText + " " + errorTitle, data.responseJSON.error);
                } else {
                    var errorTitle = data.error;
                    if (errorTitle === undefined) {
                        errorTitle = "";
                    }

                    error(data.statusText, errorTitle + ": Problem applying operation, please retry.");
                }
            });
        }

        function addAlertOnBottom(title, message, alert) {
            if (title === undefined) {
                title = "";
            }
            if (message === undefined) {
                message = "";
            }
            $('#error').append('<div class="alert ' + alert + ' alert-dismissible show no-absolute" role="alert">\n' + '  <span class="message"><strong>' + title + ' </strong>' + message + '</span>\n' + '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' + '    <span aria-hidden="true"></span>\n' + '   </button>\n' + '</div>');
            $(".alert-dismissible").fadeTo(5000, 500).slideUp(4000, function () {
                $(".alert-dismissible").alert('close');
            });

            window.setTimeout(function () {
                $(".alert").fadeTo(3000, 0).slideUp(4000, function () {
                    $(".alert-dismissible").alert('close');
                });
            }, 5000);
        }

        couponForm.addEventListener('submit', function (e) {
            e.preventDefault();
            $('#couponButton').button('loading');
            addCoupon();
        });

        function enableInputs() {
            $("button.pay").removeAttr("disabled");

            Array.prototype.forEach.call(form.querySelectorAll("input[type='text'], input[type='email'], input[type='tel']"), function (input) {
                input.removeAttribute('disabled');
            });
        }

        function disableInputs() {
            $("button.pay").attr("disabled", "disabled");
            Array.prototype.forEach.call(form.querySelectorAll("input[type='text'], input[type='email'], input[type='tel']"), function (input) {
                input.setAttribute('disabled', 'true');
            });
        }

        // Listen for errors from each Element, and show error messages in the UI.
        var savedErrors = {};
        elements.forEach(function (element, idx) {
            console.log(idx, element);
            element.on('change', function (event) {
                if (event.error) {
                    $("button.pay").attr("disabled", "disabled");
                    savedErrors[idx] = event.error.message;
                    addAlertOnBottom('Error:', event.error.message, "alert-danger");
                } else {
                    savedErrors[idx] = null;
                    // Loop over the saved errors and find the first one, if any.
                    var nextError = Object.keys(savedErrors).sort().reduce(function (maybeFoundError, key) {
                        return maybeFoundError || savedErrors[key];
                    }, null);

                    if (nextError) {
                        $("button.pay").attr("disabled", "disabled");
                        addAlertOnBottom('Error', nextError, "alert-danger");
                    } else {
                        $("button.pay").removeAttr("disabled");
                        $(".alert").alert('close');
                    }
                }
            });
        });

        function trackPaymentSuccess(data, converted, convertedGBP) {
            ga('require', 'ecommerce');
            ga('ecommerce:addTransaction', {
                'id': data.id,
                'affiliation': 'BAGBNB',
                'revenue': converted,
                'tax': '0',
                'shipping': '0'
            });

            data.bookingItems.forEach(function (item) {
                console.log(item);
                ga('ecommerce:addItem', {
                    'id': data.id,
                    'sku': item.secretDeposit.id,
                    'name': item.title,
                    'category': item.secretDeposit.defaultCityName,
                    'price': converted,
                    'quantity': 1
                });
            });

            ga('ecommerce:send');
            gtag('event', 'conversion', {
                'send_to': 'AW-871832755/-HtMCLHo02oQs7ncnwM',
                'value': converted,
                'currency': 'EUR',
                'transaction_id': data.id
            });

            var itemsForGtag = {};

            data.bookingItems.forEach(function (item) {
                console.log(item);
                //gtag
                itemsForGtag = {
                    'id': data.id,
                    'ecomm_prodid': item.secretDeposit.id,
                    'name': item.title,
                    'category': item.secretDeposit.defaultCityName,
                    'quantity': 1,
                    'ecomm_totalvalue': converted,
                    'price': converted
                };

                console.log(enableTradeTracker, hasTradeTrackerCookie);
                if (enableTradeTracker && hasTradeTrackerCookie) {
                    ttConversionOptions.push({
                        type: 'sales',
                        campaignID: tradeTrackerCampaignID,
                        productID: tradeTrackerProductID,
                        transactionID: data.id,
                        transactionAmount: convertedGBP,
                        quantity: '1',
                        email: '',
                        descrMerchant: item.title,
                        descrAffiliate: '',
                        currency: 'GBP'
                    });
                }

                // bing
                window.uetq = window.uetq || [];window.uetq.push({ 'ec': 'purchase', 'ea': 'success', 'el': item.title, 'gv': converted, 'ev': converted, 'gc': 'EUR' });
            });
            gtag('event', 'add_to_cart', {
                'send_to': 'AW-871832755/-HtMCLHo02oQs7ncnwM',
                'items': [itemsForGtag]
            });

            ga('send', 'pageview', { 'page': '/' + window.__bagbnbLocale + '/checkout/success' });

            if (enableTradeTracker && hasTradeTrackerCookie) {
                (function (ttConversionOptions) {
                    var campaignID = 'campaignID' in ttConversionOptions ? ttConversionOptions.campaignID : 'length' in ttConversionOptions && ttConversionOptions.length ? ttConversionOptions[0].campaignID : null;
                    var tt = document.createElement('script');
                    tt.type = 'text/javascript';
                    tt.async = true;
                    tt.src = '//tm.tradetracker.net/conversion?s=' + encodeURIComponent(campaignID) + '&t=m';
                    var s = document.getElementsByTagName('script');
                    s = s[s.length - 1];
                    s.parentNode.insertBefore(tt, s);
                })(ttConversionOptions);
            }
        }

        function onSuccess(data) {
            removeCookie();

            $(".modal-payment .title").text(data.title);
            $(".modal-payment .message").hide();
            $('.container-lg .bagbnb').removeClass('submitting').addClass("submitted").addClass("success");

            $("#template-content").html(template(data));
            var converted = data.totalInEUR.amount / data.totalInEUR.cents;
            var convertedInGBP = data.totalInGBP.amount / data.totalInGBP.cents;
            console.log(converted, "EUR");
            console.log(convertedInGBP, "GBP");

            trackPaymentSuccess(data, converted, convertedInGBP);
        }

        function onFailure(code, data) {

            ga('send', 'pageview', { 'page': '/' + window.__bagbnbLocale + '/checkout/error' });
            $(".modal-payment .title").text(code);
            $(".modal-payment .message").text(data);

            $('.container-lg .bagbnb').removeClass('submitting').addClass("submitted").addClass("failed");
        }

        $("#stripe-saved-submit").click(function (e) {
            performPayment(true, paymentMethodId);
        });

        // Listen on the form's 'submit' handler...
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            performPayment(false);
        });

        function performPayment(saved = false, paymentMethodId = undefined) {
            toggleValidationMessage();
            if (!isValid()) {
                return;
            }

            if (saved === false && $("#payment-card.StripeElement.StripeElement--complete").length < 1) {
                addAlertOnBottom('Error:', 'Your card\'s expiration date or CVC field is incomplete.', "alert-danger");
                return;
            }

            $(".modal-payment .title").text(chargingInProgress);
            $(".modal-payment .message").text(doNotClose);

            // Show a loading screen...
            bagbnb.classList.add('submitting');

            // Disable all inputs.
            $("button.pay").removeAttr("disabled");
            disableInputs();

            // Gather additional customer data we may have collected in our form.
            var name = form.querySelector('#' + bagbnbName + '-name');
            var address1 = form.querySelector('#' + bagbnbName + '-address');
            var city = form.querySelector('#' + bagbnbName + '-city');
            var state = form.querySelector('#' + bagbnbName + '-state');
            var email = form.querySelector('#' + bagbnbName + '-email');
            var newsletterAccept = form.querySelector('#newsletter-accept');

            if (cart === undefined) {
                return;
            }

            var customer = {
                "acceptEmailMarketing": newsletterAccept ? newsletterAccept.value : 0
            };

            var chargeData = {
                "stripeToken": "",
                "stripePaymentMethod": "",
                "customer": customer,
                "cartId": cart.id
            };

            if (token != null && token !== "" && token !== undefined) {
                if (stripeCustomerId !== "") {
                    chargeData["stripeCustomerId"] = stripeCustomerId;
                }
            }else{
                chargeData["customer"]["guestCheckout"] = true;
                if (customerEmail === "") {
                    chargeData["customer"]["firstName"] =  name.value;
                    chargeData["customer"]["lastName"] =  "-";
                    chargeData["customer"]["email"] = email.value;
                }
            }

            if (stripePaymentIntentsEnabled) {
                console.log("Using payment intents API...");
                var billingDetails = {
                    address: {
                        line1: address1 ? address1.value : undefined,
                        city: city ? city.value : undefined,
                        state: state ? state.value : undefined
                    },
                    name: name ? name.value : undefined,
                    email: email ? email.value : undefined
                };
                if (paymentMethodId === undefined) {
                    stripe.createPaymentMethod('card', elements[0], { billing_details: billingDetails }).then(function (result) {

                        if (result.paymentMethod) {
                            chargeData["stripePaymentMethod"] = result.paymentMethod.id;
                            var url = apiHost + window.__bagbnbLocale + "/pay/stripe-3d";
                            doPaymentIntentCharge(url, chargeData, onSuccess, onFailure);
                        } else {
                            onFailure('Card', "Problem with the payment gateway, please retry.");
                            enableInputs();
                        }
                    });
                } else {
                    chargeData["stripePaymentMethod"] = paymentMethodId;
                    var url = apiHost + window.__bagbnbLocale + "/pay/stripe-3d";
                    doPaymentIntentCharge(url, chargeData, onSuccess, onFailure);
                }
            } else {
                var additionalData = {
                    name: name ? name.value : undefined,
                    address_line1: address1 ? address1.value : undefined,
                    address_city: city ? city.value : undefined,
                    address_state: state ? state.value : undefined,
                    address_zip: undefined
                };
                console.log(additionalData, name);
                stripe.createToken(elements[0], additionalData).then(function (result) {
                    console.log(result);
                    console.log(additionalData, name);
                    if (result.token) {
                        chargeData["stripeToken"] = result.token.id;
                        var url = apiHost + window.__bagbnbLocale + "/pay/stripe";
                        doCharge(url, chargeData, onSuccess, onFailure);
                    } else {
                        onFailure('Card', "Problem with the payment gateway, please retry.");
                        enableInputs();
                    }
                });
            }
        }

        resetButton.addEventListener('click', function (e) {
            e.preventDefault();
            form.reset();
            elements.forEach(function (element) {
                element.clear();
            });
            enableInputs();
            $('.container-lg .bagbnb').removeClass('submitting').removeClass("submitted").removeClass("failed").removeClass("success");
        });

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        var showEmailError = false;

        function isValid() {
            var email = document.querySelector('#payment-email').value;
            return validateEmail(email);
        }

        function onChangeCheckbox(handler) {
            document.querySelector('#payment-email').addEventListener('change', handler);
        }

        function toggleValidationMessage() {
            document.querySelector('#payment-email-error').style.display = isValid() ? 'none' : 'block';
        }

        function toggleButton(actions) {
            return isValid() ? actions.enable() : actions.disable();
        }

        if (paypalSetting.isEnable) {
            paypal.Button.render({

                env: paypalSetting.env,
                client: paypalSetting.client,
                locale: localeIso,
                style: {
                    label: 'buynow',
                    branding: true,
                    size: 'medium', // small | medium | large | responsive
                    shape: 'rect', // pill | rect
                    color: 'blue', // gold | blue | silver | black
                    tagline: false
                },
                funding: {
                    allowed: [paypal.FUNDING.CARD],
                    disallowed: [paypal.FUNDING.CREDIT]
                },

                validate: function (actions) {
                    toggleButton(actions);

                    onChangeCheckbox(function () {
                        toggleButton(actions);
                    });
                },

                onClick: function () {
                    toggleValidationMessage();
                },

                // Show the buyer a 'Pay Now' button in the checkout flow
                commit: true,
                payment: function (data, actions) {

                    // Make a call to the REST api to create the payment
                    return actions.payment.create({
                        payment: {
                            transactions: [{
                                amount: { total: cart.totals.total.money.amount / cart.totals.total.money.cents, currency: cart.totals.total.money.currency },
                                description: cart.items[0].depositName + " n." + cart.items[0].bags + " bags from:" + moment(cart.items[0].dropOff).format('lll') + "  to:" + moment(cart.items[0].pickUp).format('lll')
                            }]
                        },
                        experience: {
                            input_fields: {
                                no_shipping: 1
                            }
                        }

                    });
                },

                // onAuthorize() is called when the buyer approves the payment
                onAuthorize: function (data, actions) {

                    // Set up a url on your server to execute the payment
                    var EXECUTE_URL = apiHost + window.__bagbnbLocale + '/pay/paypal'; //-fake
                    var cartId = cart.id;
                    var email = document.querySelector('#payment-email').value;

                    // Set up the data you need to pass to your server
                    data = {
                        paymentID: data.paymentID,
                        payerID: data.payerID,
                        customerEmail: email,
                        cartId: cartId
                    };

                    var options = {
                        contentType: 'application/json; charset=utf-8',
                        headers: {
                            "Authorization": "Basic YXBpOkQySzNhMlJI"
                        },
                        dataType: "json"
                    };
                    // Make a call to your server to execute the payment
                    return paypal.request.post(EXECUTE_URL, data, options).then(function (res) {
                        console.log(res);
                        onSuccess(res);
                    }).catch(function (err) {
                        onFailure("Error Please contact support!", err);
                    });
                }

            }, '#paypal-button-container');
        }
    }

    var elements = stripe.elements({
        fonts: [{
            cssSrc: 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,900'
        }],
        locale: window.__bagbnbLocale
    });

    var card = elements.create('card', {
        iconStyle: 'solid',
        hidePostalCode: true,
        style: {
            base: {
                iconColor: '#32325d',
                color: '#32325d',
                fontWeight: 300,
                fontFamily: 'Open Sans, sans-serif',
                fontSize: '14px',
                fontSmoothing: 'antialiased',

                ':-webkit-autofill': {
                    color: '#145987'
                },
                '::placeholder': {
                    color: '#8397a4'
                }
            },
            invalid: {
                iconColor: '#bf0000',
                color: '#bf0000'
            }
        }
    });
    card.mount('#payment-card');

    registerElements([card], 'payment');

    $('.another-payment-method').click(function () {
        $(this).closest('.payment').removeClass('pay-by-card');
        $(this).closest('.payment').addClass('pay-by-another');
    });

    $('.link-back-to-cards').click(function () {
        $(this).closest('.payment').removeClass('pay-by-another');
        $(this).closest('.payment').addClass('pay-by-card');
    });
});