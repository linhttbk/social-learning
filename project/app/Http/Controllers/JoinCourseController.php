<?php

namespace App\Http\Controllers;

use App\Models\Course;

class JoinCourseController extends Controller
{
    public function showViewCourse($id){
        $course = Course::find($id);
        return view('view_course', compact('course'));
    }
}