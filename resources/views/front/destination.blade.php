@extends('front.master')

@section('title', '| Drop The Bag')

@section('header-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/front/destination.css') }}">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
  	<script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
  	<link rel='stylesheet' id='onepress-bootstrap-css' href="{{ asset('css/front/bootstrap.min.css?ver=2.2.4') }}" type='text/css' media='all' />
  	<link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.2/mapbox.css' rel='stylesheet' />

@endsection

@section('body')
      <section class="city-result">
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class='pro-side d-flex'>				
                    <div class="angels-count-wrap">
                        <p class="angels-count-header">
                           <span class="angels-count-numbers">5</span>
                            Angels in&nbsp;Oslo
                        </p>
                        <p class="warning-online-booking">
                            <span class="icon-warning">!</span>
                            online booking is mandatory
                        </p>
                    </div>
                    <div class="angels-info d-none d-lg-flex">
                        <div class="angels-info-price">
                            <span class="angels-info-circle">€5</span>
                            <span class="angels-info-text">per day</span>
                        </div>
                        <div class="angels-info-time">
                            <span class="angels-info-circle">3 <sup>min</sup></span>
                            <span class="angels-info-text">Fast check-in</span>
                        </div>
                    </div>
                </div> 
			   <!--  <div class='heading'>
			      <h1>Our locations</h1>
			    </div> -->

			    <div id='listings' class='listings'>			    	

			    </div>
		    </div>
			<div class="col-md-5">
				<div id="map-cnt" class="">  
	            <div class="map-content">
	      
				<div id='map' class='map'> </div>
				 <div class="experience">
	               <h3>Safe and secure</h3>
	               <p>All deposits are <strong>secure</strong> and <strong>guaranteed</strong> and all luggage deposited through the platform are covered by the Bagbnb guarantee.</p>
	              <p><iframe class="ginger-extension-definitionpopup" src="" style="left: 301.2px; top: -108px; z-index: 100001; display: none;"></iframe>
	              </p>
	             </div>
			  </div>		  
		     </div>
		    </div>
      </div>
     </div> 
</section>
@endsection
@section('script')
<script type='text/javascript' src="{{ asset('js/front/jquery-3.4.1.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/front/bootstrap-5.2.4.min.js') }}"></script>
<script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.2/mapbox.js'></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk&sensor=true" type="text/javascript"></script>
<script>

//Function to covert address to Latitude and Longitude
	var geocoder = new google.maps.Geocoder();
	var address = "<?php echo $city; ?>";
	console.log(address);
	var latitude = '';
	var longitude = '';
	// var 
	geocoder.geocode( { 'address': address}, function(results, status) {

	  if (status == google.maps.GeocoderStatus.OK) {
	    latitude = results[0].geometry.location.lat();
	    longitude = results[0].geometry.location.lng();
	    /*console.log(latitude, longitude);*/
	    abc();
	  } 
	}); 




function abc(){
	L.mapbox.accessToken = 'pk.eyJ1Ijoic2FqYWxrdW5kdSIsImEiOiJjazM1bm9kdDcxYWlrM2xwb2hiaDc0d2E4In0.rrxwl0A7H-azJ80wbG_xJg';

	var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
       attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});


	var geojson = JSON.parse( '<?php echo json_encode($new_data) ?>' );
console.log(geojson);
	

	
	var map = L.mapbox.map('map')
	.addLayer(mapboxTiles)
	.setView([latitude, longitude], 15);

	map.scrollWheelZoom.disable();

	var listings = document.getElementById('listings');
	var locations = L.mapbox.featureLayer().addTo(map);

	locations.setGeoJSON(geojson);

	function setActive(el) {
		var siblings = listings.getElementsByTagName('div');
		for (var i = 0; i < siblings.length; i++) {
			siblings[i].className = siblings[i].className
			.replace(/active/, '').replace(/\s\s*$/, '');
		}

		el.className += ' active';
	}

	locations.eachLayer(function(locale) {

	    // Shorten locale.feature.properties to just `prop` so we're not
	    // writing this long form over and over again.
	    var prop = locale.feature.properties;
	    // Each marker on the map.
	    var popup = '<h3>Sweetgreen</h3><div>' + prop.address;
	    var link = listings.appendChild(document.createElement('a'));
	    var city = prop.city;
	    link.href = "{!! route('luggage-storage', $city) !!}";
	    link.className = 'title';
	    link.innerHTML = '<h3>Luggage Storage '+ prop.address + '</h3>';

	    var listing = document.createElement('div');
	    listing.className = 'item';
	   	link.appendChild(listing);
	    


	    var content = document.createElement('div');
		content.className = 'product-content';
		listing.appendChild(content);

	    var image = document.createElement('div');
	    image.className = 'product-img';
	    content.appendChild(image);

	    var picture = document.createElement('picture');
	    image.appendChild(picture);

	    var img = document.createElement('img');
	    picture.appendChild(img);
	    img.src = "<?php echo $photo; ?>";
	    img.width = "200";

	    var details = document.createElement('div');
	    details.className = 'details';
	    content.appendChild(details);

	    var product_description = document.createElement('div');
	    product_description.className = 'product-descr';
	    details.appendChild(product_description);

	    var product_info = document.createElement('div');
	    product_info.className = 'product-info';
	    details.appendChild(product_info);

	    var category_opening = document.createElement('div');
	    category_opening.className = 'category-opening';
	    product_description.appendChild(category_opening);

	    var opning_title = document.createElement('h5');
	    opning_title.className = 'working-time-title';
	    category_opening.appendChild(opning_title);
	    opning_title.innerHTML = 'Opening times';
	    

	    
	    // console.log(typeof JSON.parse(prop.opening_hour));
	    // console.log(JSON.parse(prop.opening_hour));
	    var opening_hour = prop.opening_hour;
	    var obj = JSON.parse( opening_hour);
	    obj.forEach(function(pio) {
	    	console.log('------------');
	    	console.log(pio);
	    	console.log('------------');
		  pios(pio);
		});

		function pios(pio) {
			var working_time_list = document.createElement('div');
		    working_time_list.className = 'working-time-list';
		    category_opening.appendChild(working_time_list);

		    var days = document.createElement('div');
		    days.className = 'days';
		    working_time_list.appendChild(days);
		    days.innerHTML = pio['opening_days'];

		    var times = document.createElement('div');
		    times.className = 'times';
		    working_time_list.appendChild(times);

		  	var span = document.createElement('span');
			span.innerHTML = pio['opening_hours'];
	    	times.appendChild(span);
		}
		


	    link.onmouseenter = function() {
	    	setActive(listing);
	      // When a menu item is clicked, animate the map to center
	      // its associated locale and open its popup.
	      map.setView(locale.getLatLng(), 15);
	      locale.openPopup();
	      var marker_bag_active = "{{ env('BASE_URL').'marker-bag-active.png' }}";
	      locale.setIcon(L.icon({
	    	iconUrl: marker_bag_active,
	    	iconSize: [35, 35],
	    	iconAnchor: [28, 28],
	    	popupAnchor: [0, -34]
	    }));	
	      return false;
	  };

	    // Marker interaction
	    locale.on('click', function(e) {
	      // 1. center the map on the selected marker.
	      map.panTo(locale.getLatLng());

	      // 2. Set active the markers associated listing.
	      setActive(listing);
	  });

	    popup += '</div>';
	    locale.bindPopup(popup);
	    var marker_bag = "{{ env('BASE_URL').'marker-bag.png' }}";
	    locale.setIcon(L.icon({
	    	iconUrl: marker_bag,
	    	iconSize: [35, 35],
	    	iconAnchor: [28, 28],
	    	popupAnchor: [0, -34]
	    }));

	});
}

</script>
@endsection 

    




