<!DOCTYPE html>
<html>
<head>
  <title>The Luggage Storage Network</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/front/payment/style.css') }}">
</head>
<body>
  <div class="container-fluid header">
    <header>
      <div class="row">
        <div class="col-md-12">
          <div class="img-section">
            <img src="{{ asset('img/DropTheBagLang.png') }}" alt="">
          </div>
          
        </div>
      </div>
    </header>
  </div>
  <div class="container info">
    <div class="row">
      <div class="col-md-12">
        <h3 class="info-first-head">Luggage Storage Oslo Station</h3>
        <div class="drop-pick-info">
          
          <h3>Drop off:</h3>
          <p>{{ $row->start_date_time }}</p>
        </div>
        <div class="drop-pick-info">
          <h3>Drop off:</h3>
          <p>{{ $row->end_date_time }}</p>
        </div>
        <div class="drop-pick-info">
          <h3>Number:</h3>
          <p>{{ $row->bag }} bags</p>
        </div>
        <div class="total-block">
          <div class="drop-pick-info">
            <h3>Total:</h3>
            <p>€{{ $row->price }}</p>
          </div>
        </div>
        
      </div>
    </div>
      
      <form action="{{ route('payment') }}" method="GET">
        <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="abc@gmail.com" required>
          </div>
        </div>
      </div>
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="amfarhad33@gmail.com">
        <input type="hidden" name="undefined_quantity" value="1">
        <input type="hidden" name="item_name" value="bag">
       <input type="text" name="custom" value="{{ $row->id }}">
        <input type="hidden" name="item_number" value="{{ $row->bag }}">
        <input type="hidden" name="amount" value="{{ $row->price }}">
        
        <input type="hidden" name="return" value="http://localhost:8000/payment/success">
        <input type="hidden" name="cancel_return" value="http://localhost:8000/payment/cancel">
        <input type="hidden" name="notify_url" value="http://localhost:8000/ipn/notify">
        <input type="image" border="0" name="submit" src="http://images.paypal.com/images/x-click-but5.gif" alt="Buy doodads with PayPal">
      </form>

{{--       <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>
  
      <a href="{{ route('payment') }}" class="btn btn-success">Pay {{ $row->price }} from Paypal</a> --}}



  </div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>