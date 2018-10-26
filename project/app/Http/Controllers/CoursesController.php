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
//        $course = DB::table('Course')
//            ->select(array('Course.*', 'User.*', 'Subject.title as title_subject', DB::raw('(Select count(*) from CourseDetail where CourseDetail.id_course =' . $id . ') as count_chapter'
//                , DB::raw(), DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student'))))
//            ->join('User', 'Course.uid', '=', 'User.uid')
//            ->join('Subject', 'Course.id_subject', '=', 'Subject.id')
//            ->where('Course.id', '=', $id)->first();
//        $course_chapter = DB::table('Course')
//            ->join('CourseDetail')
//            ->join('Chapter')
//            ->join('Lesson')
//            ->where('CourseDetail.id_chap', '=', 'Chapter.id')
//            ->where('Lesson.id_chapter', '=', 'Chapter.id')
//            ->where('CourseDetail.id', '=', $id)->get();
//        $course_lesson =
        $course = Course::find($id);
        return view('course', compact('course'));
    }
}
