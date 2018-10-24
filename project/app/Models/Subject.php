<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'Subject';

    public function chapters(){
        return $this->hasMany('App\Models\Chapter','id_subject','id');
    }
}
