<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'company_id', 'state', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    public function getAvatarAttribute($avatar){
        /*
        Este método (get<Propiedad>Attribute) intercepta el llamado a una propiedad del modelo, es decir, 
        cuando se llame a la propiedad en algun sitio ($user->avatar) en realidad se estará invocando 
        este metodo que toma como parámetro el valor de la propiedad en el momento del llamado.
        Por eso es que en la vista no se invoca sino que se sigue llamando a la propiedad normalmente.
        */
        //if(substr(Auth::user()->avatar, 0, 4) == 'http' )
        if(!$avatar || starts_with($avatar, 'http')){
            return $avatar;
        }

        return \Storage::url($avatar);
    }

}
