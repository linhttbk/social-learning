<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function postLogin(Request $request)
    {
        $user = DB::table('user')
            ->join('account', 'user.uid', '=', 'account.uid')
            ->where('user.uid','=',$request->username)
            ->get();
        $arr = ['uid' => $request->username, 'password' => $request->password];
        if($request->remember = 'Remember Me'){
            $remember = true;
        } else {
            $remember = false;
        }
        if(Auth::attempt($arr,$remember)){
//            dd($user);
            return view('index',compact('user'));
//                return redirect()->intended('/');
        } else{
//            dd("That bai");
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        }

    }

    public  function getLogout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
