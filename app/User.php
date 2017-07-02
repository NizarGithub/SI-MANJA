<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_OFFICER = 'officer';
    const ROLE_MANAGER = 'manager';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'username', 'hp', 'address', 'kecamatan_code','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kecamatan(){
        return $this->hasOne(Kecamatan::class, 'code', 'kecamatan_code');
    }
}
