<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location_detail;
use App\User;
use App\Order;

class Location extends Model
{

	protected $fillable = [
        'location', 'gender', 'first_name', 'last_name', 'company_name', 'company_form', 'UID', 'address', 'number_of_the_house', 'zip_code', 'country', 'email', 'web', 'town', 'tel', 'lng', 'lat', 'place_id',
    ];


    public function location_detail()
    {
    	return $this->belongsTo(Location_detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
