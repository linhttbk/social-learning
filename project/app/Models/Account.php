<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    //
    protected $table = 'Account';
    protected $primaryKey = 'uid';

    public  function  user(){
        return $this->belongsTo('App\Models\User');
    }
}
