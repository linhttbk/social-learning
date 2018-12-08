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
        if (Auth::guard('admin')->attempt($credentials, true)) {
            // Authentication passed...
            return redirect()->intended(route('admin'));
        }else{
            return redirect()->back()->withErrors(['error'=>'Invalid username or password! Try again!']);
        }
    }


}
