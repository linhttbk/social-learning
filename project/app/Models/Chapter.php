<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    protected $table = 'Chapter';

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'id_chapter', 'id');
    }

    public function test()
    {
        return $this->hasOne('App\Models\Test', 'id_chap', 'id');
    }
}
