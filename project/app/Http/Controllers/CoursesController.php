<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function showAllCourses()
    {
        $result = DB::table('Course')->select(array('Course.*', 'User.*', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->join('User', 'Course.uid', '=', 'User.uid')
            ->paginate(6);
        $subject = DB::table('Subject')->get();
        return view('courses', compact('result', 'subject'));

    }

    public function showCourseDetail($id)
    {
        $course = Course::find($id);
        return view('course', compact('course'));
    }

    public function showCoursesPag(){
        $result = DB::table('Course')->select(array('Course.*', 'User.name', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->leftJoin('User', 'Course.uid', '=', 'User.uid')
            ->paginate(6);
        return view('admin.courses.courses', compact('result'));
    }
}
