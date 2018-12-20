<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function postLogin(Request $request)
    {
        $credentials = $request->only('uid', 'password');
        $email = $request->input('uid');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt($credentials, true) && Auth::guard('admin')->user()->isAdmin == 1) {
            // Authentication passed...
            return redirect()->intended(route('admin'));
        } elseif(Auth::guard('admin')->user()->isAdmin == 0) {
            return redirect()->intended(route('editor'));
        }else
        {
            return redirect()->back()->withErrors(['error'=>'Invalid username or password! Try again!']);
        }
    }


}
