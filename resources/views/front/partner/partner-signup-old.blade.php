<?php
	/*require 'config/db.php';
	$nameErr					                        = "";
	$emailErr					                       	= "";
	$business_name_err					              	= "";
	$address_err					                    = "";
	$city_err					                       	= "";
	$how_did_you_heard_about_us_err					 	= "";
	$phone_no_err					                   	= "";



	$name                       = "";
	$business_name              = "";
	$address                    = "";
	$city                       = "";
	$email                      = "";
	$phone_no                   = "";
	$how_did_you_heard_about_us = "";
	$created_at = date("Y-m-d h:i:s");
	$updated_at = date("Y-m-d h:i:s");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		} else {
			$name = (vaidation_partner($_POST["name"]));
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
			}
		}


		if (empty($_POST["email"])) {
		    $emailErr = "Email is required";
		}else {
		    $email = vaidation_partner($_POST["email"]);
		    // check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $emailErr = "Invalid email format";
		    }
		}

		if (empty($_POST["business_name"])) {
		   	$business_name_err = "Business name is required";
		} else {
		   	$business_name = vaidation_partner($_POST["business_name"]);
		}

		if (empty($_POST["address"])) {
		   	$address_err = "Address name is required";
		} else {
		   	$address = vaidation_partner($_POST["address"]);
		}

		if (empty($_POST["city"])) {
		   	$city_err = "City is required";
		} else {
		   	$city = vaidation_partner($_POST["city"]);
		}

		if (empty($_POST["how_did_you_heard_about_us"])) {
		   	$how_did_you_heard_about_us_err = "How did you heard about us is required";
		} else {
		   	$how_did_you_heard_about_us = vaidation_partner($_POST["how_did_you_heard_about_us"]);
		}

		if (empty($_POST["phone_no"])) {
		   	$phone_no_err = "Phone Number is required";
		} else {
		   	$phone_no = vaidation_partner($_POST["phone_no"]);
		}

		$sql = 'INSERT INTO locations (`name`, `business_name`, `address`, `city`, `email`, `phone_no`, `how_did_you_heard_about_us`, `created_at`, `updated_at`) VALUES ("'.$name.'", "'.$business_name.'", "'.$address.'", "'.$city.'", "'.$email.'", "'.$phone_no.'", "'.$how_did_you_heard_about_us.'", "'.$created_at.'", "'.$updated_at.'")';
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			header("Location: partner-place.php?id=".$last_id);
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		    header('Loaction: partner-signup.php');
		}
	}



	function vaidation_partner($data){
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	*/
?>
<!DOCTYPE html>
<html lang="de-CH" id="arve">
<head>
	<?php include('include/header-css.php'); ?>
	<style>
		#map{
			width: 900px;
			max-width: 100%;
			height: 500px;
		}
 </style>
</head>

<body>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <p>Signup For Partner</p>
        </div>

        <div class="form-content">
        	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="regForm">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="form-group">
	                        <input type="text" name="location" class="form-control" placeholder="Name Of Your Shop/Restaurant/Location" value=""/>
	                    </div>
	                </div>
	            </div>
	           	<div class="row">
	                <div class="col-md-12">
	                	<div class="form-group">
	                        <select class="form-control" name="anr">
	                        	<option value="">Select Your Gender</option>
	                        	<option value="Female">Female</option>
	                        	<option value="Male">Male</option>
	                        	<option value="Company">Company</option>
	                        </select>
	                    </div>
	                </div>
	            </div>

            
	            <div class="row">	
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <input type="text" name="vorname" class="form-control" placeholder="First Name" value=""/>
	                    </div>
	                </div>
	               	<div class="col-md-6">
	                    <div class="form-group">
	                        <input type="text" name="lname" class="form-control" placeholder="Last Name" value=""/>
	                    </div>
	                </div>
	            </div>


	            <div class="row">
	            	<div class="col-md-12">
            			<button type="button" class="btn btn-block btn-primary btnSubmit">Submit</button>
	            	</div>
	            </div>
            </div>
        	</form>
        </div>
    </div>
</div>

<!-- <div class="container">
	<div class="row">
		<div class="col-md-12">
            <form method="post" action="" id="regForm">
	             	<div class="row">
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <input type="text" name="name" class="form-control" placeholder="Name *" value=""  />
	                        </div>
	                        <div class="form-group">
	                            <input type="text" name="business_name" class="form-control" placeholder="Business Name *" value=""  />
	                        </div>
	                        <div class="form-group">
	                            <input type="text" name="address" class="form-control" placeholder="Address *" value=""  />
	                        </div>
	                        <div class="form-group">
	                            <input type="text" class="form-control" name="city"  placeholder="City *" value=""  />
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value=""  />
	                        </div>
	                        <div class="form-group">
	                            <input type="text" minlength="10" maxlength="10" class="form-control" name="phone_no" placeholder="Your Phone *" value=""  />
	                        </div>
	                        <div class="form-group">
	                        	<label>How did you heard about us? *</label>
	                        	<br>
	                            <input type="checkbox" name="how_did_you_heard_about_us" value="Business Representative"> Business Representative
	                            <br>
	                            <input type="checkbox" name="how_did_you_heard_about_us" value="Word Of Mouth"> Word Of Mouth
	                            <br>
	                            <input type="checkbox" name="how_did_you_heard_about_us" value="Other"> Other
	                        </div>
	                    </div>
	                </div>

		        	<div class="row">
		                <div class="col-md-6 offset-3">
				        	<div class="form-group">
			                    <input id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on" class="form-control" runat="server" />
			                </div>
			                <div class="form-group">
			                    <input type="hidden" class="form-control" id="city2" name="city2" readonly />
			                </div>
			                <div class="form-group">
			                    <input type="hidden" class="form-control" id="cityLat" name="cityLat" readonly />
			                </div>
			                <div class="form-group">
			                    <input type="hidden" class="form-control" id="cityLng" name="cityLng" readonly /> 
			                </div>
			        	</div>
		        	</div>
		        <button type="submit" class="btn btn-block btn-sm btn-primary" name="btn">
                	Get Started
                </button>
            </div>
            </form>
        </div>
    </div>
</div> -->


<?php include('include/footer-script.php'); ?>								
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk&libraries=places" type="text/javascript"></script>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>
</body>
</html>
