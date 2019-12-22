<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderReview;

class OrdersController extends Controller
{
    public function index()
    {
    	$orderLists = Order::all();
    	return view('front.order.user-order-list', compact('orderLists'));
    }

    public function review($id)
    {
    	$orderId = Order::findOrFail($id);
    	return view('front.order.user-order-review', compact('orderId'));
    }

    public function storeReview(Request $request)
    {
    	$request->validate([
           'review'      => 'required',
           
        ]);

        $orderReview  = new OrderReview();
        $orderReview->review = $request->review;
        $orderReview->order_id = $request->order_id;
        $orderReview->star = $request->star;
        $orderReview->user_id = 11;

        $orderReview->save();

        return redirect()->route('userOrderList');
    }
}
