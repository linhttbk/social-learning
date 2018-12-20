<?php

namespace App\Http\Controllers\Editor;


use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\TestHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditorController extends Controller
{

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }

    public function index()
    {
        $document = DB::table('document')->select(array('document.*', 'User.name', 'Subject.*'))
            ->join('User', 'document.uid', '=', 'User.uid')
            ->join('Subject', 'document.id_subject', '=', 'Subject.id')->paginate(3);
        $totalCheck = 0;
        $totalUnCheck = 0;
        $documentAll = Document::all();
        foreach ($documentAll as $data) {
            if ($data->status == 0) {
                $totalUnCheck++;

            } else {
                $totalCheck++;
            }
        }

        return view('editor.index', ['document' => $document, 'totalCheck' => $totalCheck, 'totalUnCheck' => $totalUnCheck]);
    }

    function submitQuiz(Request $request)
    {
        $testHistory = new TestHistory();
        $testHistory->id_test = $request->id_quiz;
        $testHistory->time_start = $request->startAt;
        $testHistory->time_end = $request->endAt;
        $testHistory->uid = $request->uid;
        $testHistory->score = $request->score;
        DB::table('EditorRegistration')->where('uid', $request->uid)->update(['score' => $request->score]);
        if ($testHistory->save()) {
            $topTest = DB::table('TestHistory')->select(array('TestHistory.*', 'User.name', 'User.avatar'))->join('User', 'User.uid', '=', 'TestHistory.uid')
                ->where('id_test', '=', $request->id_quiz)->orderBy('score', 'DESC')->take(5)->get();
            return response()->json(['success' => 1, 'data' => $topTest]);
        }

        return response()->json(['success' => 0]);
    }
}
