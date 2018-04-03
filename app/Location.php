<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function items(){
    	return $this->hasMany(Item::class);
    }
}
