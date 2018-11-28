<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table = 'Lesson';
    public function chapter(){
        return $this->belongsTo('App\Models\Chapter','id_chapter','id');
    }
}
