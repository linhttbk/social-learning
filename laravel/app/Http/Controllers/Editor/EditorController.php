<?php

namespace App\Http\Controllers\Editor;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }

    public function index()
    {
        return view('editor.index');
    }
}
