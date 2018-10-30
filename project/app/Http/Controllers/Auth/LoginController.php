<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classes\ActivationService;
use Illuminate\Support\Facades\URL;

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
        $arr = ['uid' => $request->username, 'password' => $request->password];
        if ($request->remember = 'Remember Me') {
            $remember = true;
        } else {
            $remember = false;
        }
        if (Auth::attempt($arr, $remember)) {
//             return  dd($request->urlback);
            return redirect()->intended($request->urlback);
//                return redirect()->intended(route('home',['user'=>$user]));
        } else {
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
        $account = Account::where('uid', $user->uid)->first();
        if (!$account->emailverify) {
            $this->activationService->sendActivationMail($user);
            auth()->logout();
            return back()->with('warning', 'Bạn cần xác thực tài khoản, chúng tôi đã gửi mã xác thực vào email của bạn, hãy kiểm tra và làm theo hướng dẫn.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back();
    }

}
