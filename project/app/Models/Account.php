<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $table = 'Account';
    protected $primaryKey = 'uid';

    public  function  user(){
        return $this->belongsTo('App\Models\User');
    }
}
