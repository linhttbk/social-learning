<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\TestHistory;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    //
    function showQuiz($id_chap, $id_quiz, $id_course)
    {
        $listQuestion = Question::where('id_chap', $id_chap)->inRandomOrder()->take(15)->get();
        $topTest = TestHistory::where('id_test', $id_quiz)->orderBy('score', 'DESC')->take(5)->get();
        return view('test', ['listQuestion' => $listQuestion, 'id_quiz' => $id_quiz, 'id_course' => $id_course, 'id_chap' => $id_chap, 'topTest' => $topTest]);
    }

    function submitQuiz(Request $request)
    {
        $testHistory = new TestHistory();
        $testHistory->id_test = $request->id_quiz;
        $testHistory->time_start = date('Y-m-d H:i:s', strtotime($request->startAt));
        $testHistory->time_finish = date('Y-m-d H:i:s',strtotime($request->endAt));
        $testHistory->uid = Auth::user()->uid;
        $testHistory->score = $request->score;
        $testHistory->save();

        return back()->withInput()->with('score', $request->score);
    }
}
