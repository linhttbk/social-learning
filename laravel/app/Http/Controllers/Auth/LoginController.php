<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Chapter;
use App\Models\EditorRegistration;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestHistory;
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
    protected $redirectTo = '/  ';
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
            if (Auth::user()->emailverify) {
                if (Auth::user()->user->type == 2) {
                    $uid = Auth::user()->uid;
                    $editor = EditorRegistration::where('uid', $uid)->first();
                    if (!empty($editor)) {
                        if ($editor->status == 1) {
                            return redirect()->route('editor');
                        } else if ($editor->score == 0) {
                            $chap = Chapter::where('id_subject', Auth::user()->user->id_sr)->inRandomOrder()->take(1)->first();
                            $test = Test::where('id_subject', Auth::user()->user->id_sr)->first();

                            if (!empty($chap) && !empty($test)){
                                $listQuestion = Question::where('id_chap', $chap->id)->inRandomOrder()->take(15)->get();
                                $topTest = TestHistory::where('id_test', $test->id)->orderBy('score', 'DESC')->take(5)->get();
                                return view('editor_quiz', ['listQuestion' => $listQuestion, 'id_quiz' => $test->id, 'id_chap' => $chap->id, 'uid' => $editor->uid, 'topTest' => $topTest]);
                            }

                        } else {
                            Auth::logout();
                            return back()->withInput()->with('error', 'Bạn chưa được chấp thuận đăng ký.');
                        }
                    } else {
                        Auth::logout();
                        return back()->withInput()->with('error', 'Bạn chưa được chấp thuận đăng ký.');
                    }

                } else {
                    return redirect()->intended($request->urlback);
                }

            } else {
                Auth::logout();
                return back()->withInput()->with('error', 'Bạn cần xác thực tài khoản, chúng tôi đã gửi mã xác thực vào email của bạn, hãy kiểm tra và làm theo hướng dẫn.');
            }
//                return redirect()->intended(route('home',['user'=>$user]));
        } else {
//            dd("That bai");
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        }

    }

    public function getLogout()
    {
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
