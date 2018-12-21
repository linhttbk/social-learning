<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\TestHistory;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    //
    function showLesson($id_course, $id_lesson)
    {
        $course = Course::find($id_course);
        $lessoncurrent = Lesson::find($id_lesson);
        $learningprograss = [
            'id_lesson' => $id_lesson,
            'uid' => Auth::user()->uid,
            'time_start' => Carbon::now(),
        ];
        $item = DB::table('LearningProgress')->where('uid', Auth::user()->uid)->where('id_lesson', $id_lesson)->first();
        if (empty($item)) {
            DB::table('LearningProgress')->insert($learningprograss);
        } else {
            DB::table('LearningProgress')->update($learningprograss);
        }
        return view('view_course', compact('course', 'lessoncurrent'));
    }
}
