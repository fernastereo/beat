<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
		'id_invoice',
        'numeration_id',
        'invoice_date',
        'expire_date',
        'person_id',
        'term_id',
        'paymenttype_id',
        'status_id',
        'user_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function person(){
    	return $this->belongsto(Person::class);
    }
}
