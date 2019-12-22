<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Location;

class Order extends Model
{
  
	protected $fillable = [
        'start_date_time', 'end_date_time', 'bag', 'price', 'loc_id', 'user_id', 'trx_id', 'start_timestamp', 'end_timestamp', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    
}
