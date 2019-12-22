<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderReview extends Model
{
    public function order(){
    	return $this->belongsTo(Order::class);
    }
}
