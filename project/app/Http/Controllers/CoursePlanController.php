<?php

namespace App\Http\Controllers;

use App\Models\CourseDetail;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursePlanController extends Controller
{
    //
    public function getCourseDetail(Request $request){
        $courseDetail=DB::table('Course')->join('CourseDetail','Course.id','=','CourseDetail.id_course')->join('Chapter','CourseDetail.id_chap','=','Chapter.id')->where('Course.title','=',''.$request->course_reg.'')->select('Course.id','CourseDetail.id_chap','Chapter.title')->get();
        $allCourse= DB::table('Course')->get();
        if(!empty($courseDetail[0]))
            return redirect()->route('get_course_plan',[$allCourse,$courseDetail])->with('search_success','tìm thấy');
        else 
            return redirect()->route('course_plan',['allCourse'=>$allCourse])->with('search_error','không tìm thấy');
    }
    public function getCoursePlanWith($idcourse,$idchap){
    	return view('admin.courseplan.add-course-plan',['allCourse'=>$allCourse,'courseDetail'=>$courseDetail]);
    }
}
