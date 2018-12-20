<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupRequest extends Model

{
    protected $table = 'GroupRequest';

    function user(){
        return $this->belongsTo('App\Models\User','uid','uid');
    }
    //
}
