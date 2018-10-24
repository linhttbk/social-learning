<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    //
    protected $table = 'CourseDetail';
    protected $primaryKey = ['id_course','id_chap'];
    public $incrementing = false;


}
