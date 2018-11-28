<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Admin extends  Authenticatable
{
    use Notifiable,HasApiTokens;
    protected $table = 'Admin';
    protected $primaryKey = 'uid';
    public $incrementing = false;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
