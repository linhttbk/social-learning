<?php

namespace App\Http\Controllers;

use App\Classes\ActivationService;
use App\Jobs\SendWelcomeEmail;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use File;

class RegisterController extends Controller
{
    protected $activationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware('guest');
        $this->activationService = $activationService;
    }

    public function regis(Request $req)
    {   
        $uid = $req->usernamereg;
        $email = $req->email;
        if (User::find($uid)) {
            return back()->withInput()->with('error' ,'Tai khoan da su dung');
        } else if (User::where('email', $email)->first()) {
            return back()->withInput()->with('error' ,'Email da su dung');
        } 
        else {
                $user = new User();
                $account = new Account();

                $account->uid = $req->usernamereg;
                $account->password = bcrypt($req->passwordreg);
                $account->status = 0;

                $user->uid = $req->usernamereg;
                $user->type = $req->type;
                $user->name = $req->name;
                $user->email = $req->email;
                $user->birthday = date('Y-m-d', strtotime(str_replace('-', '/', $req->birthday)));
                $user->sex = $req->sex;
                $user->school = $req->school;
                $user->phone = $req->phone;
                $user->grade = $req->grade;
                //type =1 2 la gv hoac kdv
                if ($req->type == '1' || $req->type = '2') {
                    $id_subreg = $req->subjectreg;
                    if ($id_subreg == "Toán")
                        $user->id_sr = 1;
                    else if ($id_subreg == "Lý")
                        $user->id_sr = 2;
                    else if ($id_subreg == "Hóa")
                        $user->id_sr = 3;
                    else if ($id_subreg == "Tiếng Anh")
                        $user->id_sr = 4;
                    else if ($id_subreg == "Ngữ Văn")
                        $user->id_sr = 5;
                }
                if (!empty($req->image)) {
                    $file = $req->file('image');
                    $imageName = time() . '.' . $req->image->getClientOriginalExtension();
                    $filePath = 'images/' . $imageName;
                    Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
                    $imageSave = 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/' . $imageName;
                    $user->avatar = $imageSave;
                }
                $user->save();
                $account->save();
                $this->activationService->sendActivationMail($user);
                return redirect('login')->with('success', "Xác thực email để kích hoạt tài khoản");
            }
        }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            //auth()->login($user);
            return redirect('login');
        }
        abort(404);
    }
}
