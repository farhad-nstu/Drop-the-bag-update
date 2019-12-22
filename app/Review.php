<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'star', 'review',
    ];

  
}
