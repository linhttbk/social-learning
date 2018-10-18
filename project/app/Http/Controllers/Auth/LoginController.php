<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Classes\ActivationService;

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
    protected $redirectTo = '/';
    protected $activationService;
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->activationService = $activationService;
    }
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
      protected function authenticated(Request $request, $user)
    {
        if (!$user->active) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Bạn cần xác thực tài khoản, chúng tôi đã gửi mã xác thực vào email của bạn, hãy kiểm tra và làm theo hướng dẫn.');
        }
        return redirect()->intended($this->redirectPath());
    }
}
