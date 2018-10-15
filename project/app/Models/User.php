<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //
    protected $table = 'User';
    protected $primaryKey = 'uid';
    public $incrementing = false;


    public function account()
    {
        return $this->hasOne('App\Models\Account','uid','uid');
    }

}
