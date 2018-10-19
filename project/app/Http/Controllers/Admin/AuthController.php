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
        if (Auth::attempt(['uid' => $email, 'password' =>$password])) {
            // Authentication passed...
            return redirect()->intended(route('admin'));
        }else {
            return var_dump($credentials);
        }
    }


}
