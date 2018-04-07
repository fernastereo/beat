<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'company_id',
        'id_item',
        'name',
        'description',
        'image',
        'location_id',
        'cost',
        'price',
        'unit_id',
        'stock',
        'stock_min',
        'stock_max',
        'tax_id',
        'included_tax',
        'max_discount',
        'state',
    ];

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

    public function unit(){
    	return $this->belongsTo(Unit::class);
    }

    public function tax(){
        return $this->belongsTo(Tax::class);
    }

	public function getImageAttribute($image){
        if(!$image || starts_with($image, 'http')){
            return $image;
        }

        return \Storage::url($image);
    }

}
