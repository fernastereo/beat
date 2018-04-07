<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function users(){
    	return $this->hasMany(User::class);
    }

    public function locations(){
    	return $this->hasMany(Location::class);
    }

    public function units(){
    	return $this->hasMany(Unit::class);
    }

    public function items(){
    	return $this->hasMany(Item::class);
    }

    public function taxes(){
        return $this->hasMany(Tax::class);
    }
}
