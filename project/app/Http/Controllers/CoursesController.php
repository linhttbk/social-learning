<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function showAllCourses()
    {
        $result = DB::table('Course')->select(array('Course.*', 'User.name', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->leftJoin('User', 'Course.uid', '=', 'User.uid')
            ->paginate(6);
         return view('courses', compact('result'));

    }
}
