@extends('front.master')

@section('title', '| Drop The Bag')

  @section('body')
      <style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
      height: 400px !important;
      width: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
  /*  html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }*/
    .controls {
      background-color: #fff;
      border-radius: 2px;
      border: 1px solid transparent;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      box-sizing: border-box;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      height: 29px;
      margin-left: 17px;
      margin-top: 10px;
      outline: none;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 400px;
    }

    .controls:focus {
      border-color: #4d90fe;
    }
    .title {
      font-weight: bold;
    }
    #infowindow-content {
      display: none;
    }
    #map #infowindow-content {
      display: inline;
    }  
  </style>

      

<div id="page">
  <div class="container">
    <div id="map"></div>
  </div>
<br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('partner-subscription-complete', $partner_subscription->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label" for="capacity_of_bag">Capacity Of Bag</label>
                <input type="number" class="form-control" id="capacity_of_bag" name="capacity_of_bag" required>
              </div>
            </div>
          </div>

          

        <div class="add-more-file-div">  
        <?php $x = 0; ?>
        <?php foreach($days as $day){ ?>

        

          <div class="row" id="row<?php echo $x; ?>">
            <div class="col-md-5">
              <div class="form-group">
                <label class="control-label">Day</label>
                <select class="form-control" name="days[]" required>
                  <option value="">---Select Day---</option>
                  <option value="Sunday" <?php if($day == 'Sunday'){echo 'selected';}?> >Sunday</option>
                  <option value="Monday" <?php if($day == 'Monday'){echo 'selected';}?> >Monday</option>
                  <option value="Tuesday" <?php if($day == 'Tuesday'){echo 'selected';}?> >Tuesday</option>
                  <option value="Wednesday" <?php if($day == 'Wednesday'){echo 'selected';}?> >Wednesday</option>
                  <option value="Thursday" <?php if($day == 'Thursday'){echo 'selected';}?> >Thursday</option>
                  <option value="Friday" <?php if($day == 'Friday'){echo 'selected';}?> >Friday</option>
                  <option value="Saturday" <?php if($day == 'Saturday'){echo 'selected';}?> >Saturday</option>
                </select>
              </div>
            </div>

            
            

            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">From Time</label>
                <input type="time" class="form-control from_time" id="from_time" name="from_time[]" required value='<?php echo date("H:i", strtotime($starting_times[$x]));?>' >
              </div>
            </div>

            
            <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">To Time</label>
                <input type="time" class="form-control to_time" id="to_time" name="to_time[]" required value='<?php echo date("H:i", strtotime($ending_times[$x]));?>' >

              </div>
            </div>

            <div class="col-md-1">
              <div class="form-group">
                <button type="button" class="btn btn-sm btn-danger remove" id="remove-row" serial="<?php echo $x; ?>">X</button>
              </div>
            </div>
          </div>

        
        <?php $x++; ?>
        <?php } ?>

          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <button type="button" class="btn btn-sm btn-primary" id="add-row">Add</button>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <?php if($photo == null) { ?>
                <input type="file" name="image" class="form-control" accept="image/*">
                <?php } ?>
                <input type="hidden" name="old_image" value="<?php echo $photo; ?>">
                <br/>
                <img src="<?php echo $photo; ?>" style="width: 200px; height: 200px;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">The Data Is Accurate?</label><br/>
                <input type="checkbox" name="agree" id="agree" value="1"> Yes
                <input type="text" name="code" id="code" readonly="">
               
                <input type="hidden" name="loc_id" id="loc_id" value="<?php echo $loc_id; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary" id="save" disabled>Save</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
  <br>
  <br>
  <br>
  @endsection 

  @section('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk&libraries=places&callback=initMap">
</script>
{{-- <script type="text/javascript" src="{{ asset('js/front/map/init.js') }}"></script> --}}




              
<script>

      $(document).ready(function(){


        // function initialize() {
        //   var input = document.getElementById('searchTextField');
        //   var autocomplete = new google.maps.places.Autocomplete(input);
        //   var google = google.maps.event.addListener(autocomplete, 'place_changed', function () {
        //         var place = autocomplete.getPlace();
        //         window.location.href= "destination.php?city="+place.name.replace(/\s+/g, '-').toLowerCase();
        //     });
        // }
        // google.maps.event.addDomListener(window, 'load', initialize);



        var c_day = "<?php echo $c_day; ?>";
        var x = 0;
        if(c_day > 0){
          x = c_day;
        }
        
        $('#add-row').click(function(){
            var html_file = '<div class="row" id="row'+x+'"><div class="col-md-3"><div class="form-group"><label class="control-label">From Day</label><select class="form-control" name="from_day[]" required><option value="">---Select Day---</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">From Time</label><input type="time" class="form-control from_time" id="from_time" name="from_time[]" required></div></div><div class="col-md-3"><div class="form-group"><label class="control-label">To Time</label><input type="time" class="form-control to_time" id="to_time" name="to_time[]" required></div></div><div class="col-md-1"> <div class="form-group"><button type="button" class="btn btn-sm btn-danger remove" id="remove-row" serial="'+x+'">X</button></div></div></div>';
            $('.add-more-file-div').append(html_file);
        });

        $(document).on('click','.remove', function(){
          var serial = $(this).attr('serial');
          $('#row'+serial).remove();
        });


        $(document).on('click','#agree', function(){
          var agree = $('#agree').prop('checked');
          if(agree === true){
            $("#save").removeAttr("disabled");
            code = makeid(8);
            $("#code").val(code);
          }else{
            $("#save").attr("disabled", "disabled");
            $("#code").val('');
          }
          // var all_right_val = $(this).val();
        });

        function makeid(length) {
          var result           = '';
          var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
          var charactersLength = characters.length;
          for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
          }
          return result;
        }
        
    });


      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      var lat = parseFloat("<?php echo $lat; ?>");
      var lng = parseFloat("<?php echo $lng; ?>");
      var place_id = "<?php echo $place_id; ?>";
      console.log(lat,lng,place_id);
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: lat, lng: lng},
          zoom: 15
        });
       /* window.HTMLInputElement (map);*/

        var request = {
          placeId: place_id,
          fields: ['name', 'formatted_address', 'place_id', 'geometry', 'photos', 'reference', 'opening_hours']
        };

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        const api_key = "AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";

        service.getDetails(request, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            console.log(place);
            var ref = place.reference;
            var opening_hour = place.opening_hours.weekday_text;
            // oepnign_hour.forEach(weekendText);
            console.log(opening_hour);
            var photos = place.photos;
            if (!photos) {
              return;
            }
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location,
              title: place.name
              // icon: photos[0].getUrl({maxWidth: 35, maxHeight: 35})
            });

            var html = '';
            var image = photos[0].getUrl({maxWidth: 260, maxHeight: 100});
            google.maps.event.addListener(marker, 'click', function() {
              var opening_time = '';
                $.each( opening_hour, function( i, val ) {
                    opening_time = opening_time + '<p id="demo0">'+val+'</p>';
                  });
             
              var html ='<div>' + 
                "<p><img width='260' src=" + image + "></p>" +
                '<strong>Name: '+ place.name +'</strong><br/>'+ 
                'Place: ' + place.formatted_address+ '<br>'+'<strong>Opening Hours: </strong><br>'+
                opening_time
                +'</div>';

              infowindow.setContent(html);
              infowindow.open(map, this, html);
              
            });
          }
        });


      }

      

    </script>
     
     {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk&libraries=places"></script> --}}
  @endsection

    




