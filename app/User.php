<?php

namespace App;

use App\Company;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;

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

    public function contacts($id){
        $userCompany = User::find($id);
            
        $users = User::where([
            ['id', '<>', $id],
            ['company_id', $userCompany->company_id],
        ])->get();

        return $users;
    }
}
