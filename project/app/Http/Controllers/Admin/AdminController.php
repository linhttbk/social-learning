<?php

namespace App\Http\Controllers\Admin;

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
}
