<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table = 'persons';
	
	protected $fillable = [
            'idperson',
            'verification_digit',
            'name',
            'address',
            'city_name',
            'email',
            'phone_number_1',
            'phone_number_2',
            'cellphone_number_1',
            'credit_limit',
            'credit_used',
            'person_type',
            'comments',
            'company_id',
            'state'		
	];
	public function company(){
		return $this->belongsTo(Company::class);	
	}
}
