<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseRegistrationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->only('registerCourse');
    }

    public function registerCourse($id, Request $request)
    {
        $this->validate($request, [
            'captcha' => 'required|captcha'
        ]);
        $uid = Auth::user()->uid;
        $time = Carbon::now();
        $registration = DB::table('CourseRegistration')->where('id_course', '=', $id)
            ->where('uid', '=', $uid)->get();
        if (count($registration) > 0) return back()->withInput()->with('error', 'Ban da dang ky khoa hoc nay');
        else {
            DB::table('CourseRegistration')->insert(['uid' => $uid, 'id_course' => $id, 'date_reg' => $time]);
            return back()->withInput()->with('success', 'Dang ky thanh cong');
        }
    }

    public function goToBuyCourse($id)
    {
        $course = Course::find($id);
        return view('course_reg', compact('course'));
    }
}
