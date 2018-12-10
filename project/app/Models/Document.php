<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $primaryKey = 'id';

    public  function  user(){
        return $this->belongsTo('App\Models\User');
    }
}
