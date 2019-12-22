<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
/*use Illuminate\Http\Request;*/



use App\Location;
use App\Location_detail;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerSubscription;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.partner.partner-subscription');
    }

    public function create()
    {
        //
    }


    public function __construct(User $user, Location $location)
    {
        $this->user = $user;
        $this->location = $location;
    }
    

    // Partner Subscription store
    public function store(Request $request)
    {

        $this->location->location = $request->location;
        $this->location->gender = $request->gender;
        $this->location->first_name = $request->first_name;
        $this->location->last_name = $request->last_name;
        $this->location->company_name = $request->company_name;
        $this->location->company_form = $request->company_form;
        $this->location->UID = $request->UID;
        $this->location->address = $request->address;
        $this->location->number_of_the_house = $request->number_of_the_house;
        $this->location->zip_code = $request->zip_code;
        $this->location->country = $request->country;
        $this->location->email = $request->email;
        $this->location->web = $request->web;
        $this->location->town = $request->town;
        $this->location->tel = $request->tel;
        $this->location->lng = $request->lng;
        /*dd($this->location->lng);*/
        $this->location->lat = $request->lat;
        $this->location->place_id = $request->place_id;
        $this->location->save();

        /*return redirect()->route('partner-place', ['id' => $location->id]);*/
        return redirect()->route('partner-place', $this->location->id);

    }

    
    // After Partner Subscription go to this blade file 
    public function partnerPlace($id)
    {
        $partner_subscription = Location::findOrFail($id);
        $place_id = Location::findOrFail($id)->place_id;
        $loc_id = Location::findOrFail($id)->id;
        $lat    = Location::findOrFail($id)->lat;
        $lng    = Location::findOrFail($id)->lng;

        $data = "https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk&fields=name,rating,formatted_phone_number,opening_hours,reference,photos,place_id&place_id=$place_id";

        $du = file_get_contents($data);
        $getDetails = json_decode($du,true);


        if ($getDetails['status']=="OK"){
           $placeId =  $getDetails['result']['place_id'];
           $photoReference = $getDetails['result']['photos'][0]['photo_reference'];

           $opening_hours = $getDetails['result']['opening_hours']['weekday_text'];
        }
        else{
           return "Place ID not found";
        }

        $days = [];
        $starting_times = [];
        $ending_times = [];
        foreach($opening_hours as $key => $value){
            $arr = explode(": ", $value);
            $day = $arr[0]; 
            $time = $arr[1];
            $starting_time = substr($time,0,7); 
            $ending_time = substr($time,12,17); 
            array_push($days, $day);
            array_push($starting_times, $starting_time);
            array_push($ending_times, $ending_time);
        }

        $c_day = count($days);


        $photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$photoReference&key=AIzaSyBzC94pnwIAUI5G3HQKxFCnFBiDiHIIfJk";


        return view('front.partner.partner-place', compact('c_day', 'days', 'starting_times', 'ending_times', 'photo', 'loc_id', 'lat', 'lng', 'place_id', 'partner_subscription',));

    }


    

    //Partner Subscription Complete
    public function partnerSubscription(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        
        // Store user
        $password = Str::random(8);
        $this->user->name = $location->first_name;
        $this->user->email = $location->email;
        $this->user->password = Hash::make($password);
        $this->user->save();

        $location->user_id = $this->user->id;
        $location->save();
        // dd($random);
        $request->validate([
           'capacity_of_bag'      => 'required',
           
        ]);

        $data = array();
        $arr = array();

        foreach($request->days as $key => $value){
            $arr['opening_days'] = $value;
            $arr['opening_hours'] = $request->from_time[$key].'-'.$request->to_time[$key];
            array_push($data, $arr);
        }

        $json_data       = addslashes(json_encode($data));
        
        
        $partnerSubscriptionComplete                  = new Location_detail();
        $partnerSubscriptionComplete->capacity_of_bag = $request->capacity_of_bag;
        $partnerSubscriptionComplete->loc_id          = $request->loc_id;
        $partnerSubscriptionComplete->opening_hours   = $json_data;
        $partnerSubscriptionComplete->user_id         = $this->user->id;


        if($request->old_image == null){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image.'.'.$ext;
                $upload_path='images/';
                $image_url=$upload_path.$image_full_name;
                $image->move($upload_path,$image_full_name);
                
            }else{
                $image_url = null;
            }
        }else{
            $image_url = $request->old_image;
        }
        


        $userEmail = $location->email;
        Mail::to($userEmail)->send(new PartnerSubscription($userEmail, $password));
        $partnerSubscriptionComplete->image = $image_url;
        $partnerSubscriptionComplete->save();
        return redirect()->route('front.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
