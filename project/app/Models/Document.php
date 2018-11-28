<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'Document';
    protected $primaryKey = 'id';

    public  function  user(){
        return $this->belongsTo('App\Models\User');
    }
}
