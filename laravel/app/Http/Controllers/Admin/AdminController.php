<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\EditorRegistration;
use App\Models\User;
use App\Models\Document;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }

    public function index()
    {
        $new_clients = User::where('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())->count();
        $open_courses = Course::where('start_date', '<=', Carbon::now()->toDateTimeString())
            ->where('end_date', '>', Carbon::now()->toDateTimeString())->count();
        $editor_regs = EditorRegistration::where('status', 0)->count();
        $new_docs = Document::where('created_at', '>=', Carbon::now()->subDays(7)->toDateTimeString())->count();
        $visitors = [50, 60, 70, 53, 25, 47];
        $viewers = [49, 62, 67, 18, 29, 37];
        $now = Carbon::now();
        $day = cal_days_in_month(CAL_GREGORIAN,$now->month,$now->year);
        $label_month = range(1,$day);
        exec("uptime", $uptimeVar);
        //dd($uptimeVar);
        return view('admin.index', ['new_clients' => $new_clients,
            'open_courses' => $open_courses,
            'editor_regs' => $editor_regs,
            'new_docs' => $new_docs,
            'visitors' => $visitors,
            'viewers' => $viewers,
            'label_month'=>$label_month]);
    }
}
