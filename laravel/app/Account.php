<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
     protected $table = "Account";
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
