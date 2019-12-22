<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Location_detail;
use Auth;
use Illuminate\Support\Str;
use App\Review;

class OrderController extends Controller
{
    public function giveOrder(Request $request, $loc_id)
    {
    	$loc_id = $loc_id;

    	$start_date_time = $request->start_date.' '.$request->start_time;
    	$start_timestamp = strtotime($start_date_time);
    	$end_date_time = $request->end_date.' '.$request->end_time;
    	$end_timestamp = strtotime($end_date_time)-1;
    	$bag = $request->bag;

        $sql_order = Order::where('start_timestamp', '<=', $start_timestamp)->where('end_timestamp', '>=', $end_timestamp)->get();
        // dd($sql_order);
        $rows = [];
        $random_code = Str::random(10);
		if(count($sql_order) > 0){
			foreach($sql_order as $key => $value){
			  	$rows[] = $value;
			  	// dd($rows);
			}
			$max_bag = 0;
			while ( $start_timestamp <= $end_timestamp ) {
				$temp_max_bag = 0;
				$temp_end_time = $start_timestamp+899;
				for ($i=0; $i < count($rows); $i++) { 
					if(($rows[$i]['start_timestamp'] <= $start_timestamp) && ($rows[$i]['end_timestamp'] >= $temp_end_time)){
						$temp_max_bag += $rows[$i]['bag'];
					}
				}
				if ($max_bag < $temp_max_bag) {
					$max_bag = $temp_max_bag;
				}
				
				// var_dump($max_bag);
				$start_timestamp = $temp_end_time+1;
			}

			$sql = Location_detail::where('loc_id', $loc_id)->get();
			// dd($sql);
			// foreach($sql as $key => $value){
			// 	$rows = $value;
			// }
			
			if(count($sql) > 0){
				foreach($sql as $key => $value){
					$capacity_of_bag = $value->capacity_of_bag;
				}
				if($capacity_of_bag >= $max_bag){

					$orders = new Order();
					$orders->start_date_time = $start_date_time;
					$orders->end_date_time = $end_date_time;
					$orders->start_timestamp = $start_timestamp;
					$orders->end_timestamp  = $end_timestamp;
					$orders->loc_id = $loc_id;
					$orders->user_id = Auth::id();
					$orders->bag  = $bag;
					$orders->price = $request->price;
					$orders->random_code = $random_code;
					$orders->save();

					if ($orders) {
						$last_id = $orders->id;
						return redirect()->route('payment-view', ['last_id' => $last_id]);
					} else {
						echo "error here";
					}

				} else{
					echo 'Not Enough space now.';
				}
			}
	    } else{ 
			$orders = new Order();
			$orders->start_date_time = $start_date_time;
			$orders->end_date_time = $end_date_time;
			$orders->start_timestamp = $start_timestamp;
			$orders->end_timestamp  = $end_timestamp;
			$orders->loc_id = $loc_id;
			$orders->user_id = Auth::id();
			$orders->bag  = $bag;
			$orders->price = $request->price;
			$orders->random_code = $random_code;
			$orders->save();

			if ($orders) {
				$last_id = $orders->id;
				return redirect()->route('payment-view', ['last_id' => $last_id]);
			} else {
				echo "errror here";
			}
	    }
    	
    }

    public function payment($last_id)
    {
    	
    	$order_id = $last_id;
    	$row = Order::where('id', $order_id)->first();
    	/*foreach ($rows as $key => $value) {
    		$ids = $value->id;
    	}*/
    	
    	return view('front.payment', compact('row'));
    }


    public function allOrder()
    {
    	$allOrder = Order::all();
    	return view('front.user-order-list', compact('allOrder'));
    }

    public function orderReview($id)
    {
    	$order_id = $id;
    	return view('front.order-review', compact('order_id'));
    }

    public function reviewStore(Request $request, $order_id)
    {
    	$order_id = $order_id;

    	$reviews = new Review();
    	/*dd($reviews);*/
    	$reviews->user_id = 5;
    	$reviews->order_id = $order_id;
    	$reviews->star = $request->star;
    	$reviews->review = $request->review;
    	$reviews->save();
    	return redirect('/home');
    }
}
