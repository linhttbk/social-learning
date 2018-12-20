<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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

    public function showCourseDetailRegistered($id)
    {
        $course = Course::find($id);
        return view('view_course', compact('course'));
    }

     public function showCourseDetail($id)
     {
         $course = Course::find($id);
         if (Auth::check()) {
             $check_registered_course = DB::table("CourseRegistration")->where([["id_course", "=", $id], ["uid", "=", Auth::user()->uid]])->get();
         }
 //        dd($check_registered_course);
         if (empty($check_registered_course[0])) {
             return view('course', compact('course'));
         } else {
             return view('view_course', compact('course'));
         }
     }

    public function showAllCoursesUser($id)
    {
        $result = DB::table('Course')->select(array('Course.*', 'User.*',
            DB::raw('(Select vote from Rate where Rate.uid="'.$id.'" and  Rate.id_course = Course.id) as score')
        , DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->join('User', 'Course.uid', '=', 'User.uid')
            ->join('CourseRegistration', 'Course.id', '=', 'CourseRegistration.id_course')
            ->where('CourseRegistration.uid', '=', $id)
            ->paginate(6);
        $rate = DB::table('Rate')->where('uid',$id)->get();
        $subject = DB::table('Subject')->get();
        return view('member.course.my_course', compact('result', 'subject','rate'));

    }

    public function getCoursePlan()
    {
        $allCourse = DB::table('Course')->get();
        return view('admin.courseplan.add-course-plan', ['allCourse' => $allCourse]);
    }

    public function rateCoursesUser(Request $request)
    {
        $score = floor($request->score + 0.5);
        $rate = [
            'uid' => Auth::user()->uid,
            'vote' => $score,
            'id_course' => $request->id,
            'comment' => $request->comment,
            'created_at'=>Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $item = DB::table('Rate')->where('uid', Auth::user()->uid)->where('id_course', $request->id)->first();
        if (empty($item)) {
            DB::table('Rate')->insert($rate);
        } else {
            DB::table('Rate')->update($rate);
        }

        return response()->json(['success' => 1, 'score' => $score]);
    }
}

