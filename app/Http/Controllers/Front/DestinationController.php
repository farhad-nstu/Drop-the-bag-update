<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function destination($city)
    {    /*dd($city);*/
    	return view('front.destination');
    }
}
