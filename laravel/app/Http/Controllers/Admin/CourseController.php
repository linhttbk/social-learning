<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //

    public function searchCourse(Request $request)
    {
        $recent_courses = Course::where('created_at', '<', Carbon::now()->addWeek(1))->count();
        $key_search = $request->input('key-search');
        $totalCourses = DB::table('Course')->count();
        $result = DB::table('Course')->select(array('Course.*', 'User.name', 'Subject.title as subject', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->leftJoin('User', 'Course.uid', '=', 'User.uid')
            ->join('Subject', 'Course.id_subject', '=', 'Subject.id')
            ->where('Course.title', 'like', '%' . $key_search . '%')
            ->orWhere('User.name', 'like', '%' . $key_search . '%')
            ->paginate(6);
        return view('admin.courses.course', compact('totalCourses', 'recent_courses', 'result', 'key_search'));
    }

    public function showCoursesPag()
    {
        $totalCourses = DB::table('Course')->count();
        $result = DB::table('Course')->select(array('Course.*', 'User.name', 'Subject.title as subject', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
            ->leftJoin('User', 'Course.uid', '=', 'User.uid')
            ->join('Subject', 'Course.id_subject', '=', 'Subject.id')
            ->paginate(6);
        $recent_courses = Course::where('created_at', '<', Carbon::now()->addWeek(1))->count();
        return view('admin.courses.course', compact('result', 'totalCourses', 'recent_courses'));
    }

    public function showAddCourse()
    {
        $allSubject = Subject::where('id_parent', '!=', null)->get();
        $chapters = DB::table('Chapter')->select(array('Chapter.*', DB::raw('(Select Count(*) from Lesson where Lesson.id_chapter = Chapter.id) as lessons')))->get();
        $lessons = Lesson::all();
        $teachers = DB::table('User')->join('Subject', 'User.id_sr', '=', 'Subject.id')
            ->where('type', 1)->get();
        return view('admin.courses.add-courses', compact('allSubject', 'teachers', 'chapters','lessons'));
    }

    public function addCourse(Request $request)
    {
        $listChapId = $request->listChapId;
        $result = '';
        foreach ($listChapId as $data){
            $result .= $data;
        }

        return $result ;
    }
}
