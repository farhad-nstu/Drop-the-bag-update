<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\User;

class Location_detail extends Model
{
	protected $fillable = [
        'loc_id', 'opening_hours', 'capacity_of_bag', 'image',
    ];

    public function locations()
    {
    	return $this->hasMany(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
