<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //
    function showQuiz($id_chap)
    {
        $listQuestion = Question::where('id_chap', $id_chap)->inRandomOrder()->take(15)->get();
        return view('test', ['listQuestion' => $listQuestion]);
    }
}
