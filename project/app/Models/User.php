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
        return $this->hasOne('App\Models\Account', 'uid', 'uid');
    }

    public function myGroups()
    {
        return $this->hasMany('App\Models\GroupUser', 'uid', 'uid');
    }



    public function myJoinGroups()
    {
        return $this->hasManyThrough('App\Models\GroupUser', 'App\Models\GroupMember', 'uid', 'id', 'uid', 'id_group')
            ->where('GroupMember.role', '!=', '2');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
