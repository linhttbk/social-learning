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

}
