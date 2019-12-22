<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Location;
use App\Location_detail;

class LocationController extends Controller
{
    public function destination($city)
    {   
    	// dd($city);
    	$city = $city;
        // dd($city);
    	$data = array();
    	$results = Location::where('town', $city)->get();
    	if($results) {
		  foreach($results as $key => $value){
		  	$data[] = $value;
		  	$place_id = $value->place_id;
		  }
		}

    	$jsonData =json_encode($data);
    	$original_data = json_decode($jsonData, true);


    	$ids = [];
    	if($results) {
		  foreach($results as $key => $value){
		  	$ids[] = $value->id;
		  }
		}

		
    	$loc_data = [];
    	$id_sql = Location_detail::whereIn('loc_id', $ids)->get();

    	if($id_sql) {
		  foreach($id_sql as $key => $value){
		  	$loc_data[] = $value;
		  }
		}

    	$json_data =json_encode($loc_data);
	    $location_data = json_decode($json_data, true);
    	// dd($location_data);
       
    	$features = array(); 
		foreach ($location_data as $key1 => $value1) {
			foreach($original_data as $key => $value) {
			/*dd($value);*/
				
				$data = "https://maps.googleapis.com/maps/api/place/details/json?place_id=".$value['place_id']."&fields=photos&key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";
				

				$du = file_get_contents($data);
				$getDetails = json_decode($du,true);
               
                
				if ($getDetails['status']=="OK"){
				   
				   $photoReference = $getDetails['result']['photos'][0]['photo_reference'];
				}

				$photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";
				$features[] = [
			    	"type"=>"Feature",
			    	"geometry"=>[
			    			"type"=>"Point",
			    			"coordinates"=>[
				                $value['lng'],
				                $value['lat']
			    			]
			    		],
			    	"properties"=>[
			    		"phoneFormatted"=>"(202) 234-7336",
			    		"phone"=>$value["tel"],
			    		"address"=>$value["address"],
			    		"city"=>$value["town"],
			    		"country"=>$value["country"],
			    		"capacity_of_bag"=>$value1['capacity_of_bag'],
			    		"image"=>$photo,
			    		"opening_hour"=>$value1['opening_hours'],
			    	]
			    ];
			}
		}

		$new_data = array(
		    'type' => 'FeatureCollection',
		    'features' => $features,
		);	
		// dd($new_data);
    	
    	return view('front.destination', compact('new_data', 'city', 'photo'));

    }


    //Luggaeg storage
    public function luggageStorage($city)
    {
    	$city = $city;

    	$data = array();
    	$results = Location::where('town', $city)->get();
    	if($results) {
		  foreach($results as $key => $value){
		  	$data[] = $value;
		  	$loc_id = $value->id;
		  	$place_id = $value->place_id;
		  }
		}
		$opening_hour = '';
		$loc_sql = Location_detail::where('loc_id', $loc_id)->get();

        // dd($loc_sql);
    	
		  foreach($loc_sql as $key => $value){
		  	$image = $value->image;
		  	$opening_hour = $value->opening_hours;
		  	$luggage = $value->capacity_of_bag;
		  }
		// dd($opening_hour);

	$working_hour = stripslashes($opening_hour);
	$working_hours = json_decode($working_hour);
	// dd($working_hours);

	$photo_data = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=photos&key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";

	  $du = file_get_contents($photo_data);
	   $getDetails = json_decode($du,true);

	   if ($getDetails['status']=="OK"){
	       $photoReference = $getDetails['result']['photos'][0]['photo_reference'];
	   }

	   $photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";


    	return view('front.luggage-storage', compact('working_hours', 'photo', 'city', 'loc_id', 'luggage'));
    }


    
}
