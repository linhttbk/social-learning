<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $table = 'Course';

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'id_subject', 'id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\CourseDetail', 'id_course', 'id');
    }
    public function registrations(){
        return $this->hasMany('App\Models\CourseRegistration','id_course','id');
    }
    public function chapters(){
        return $this->hasManyThrough('App\Models\Chapter','App\Models\CourseDetail','id_course','id','id','id_chap');
    }
    public function user(){
        return $this->belongsTo('App\Models\User', 'uid', 'uid');
    }
}
