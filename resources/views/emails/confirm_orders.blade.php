<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Scan the following QR code:</h3>
	<a href="{{ URL::to($image) }}" download><img src="{{ $message->embed(public_path().'/'.$image) }}" width="200px;" /></a>
</body>
</html>
