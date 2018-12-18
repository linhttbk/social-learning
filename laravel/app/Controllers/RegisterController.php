<?php

namespace App\Http\Controllers;

use App\Classes\ActivationService;
use App\Jobs\SendWelcomeEmail;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
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

    public function regis(Request $request)
    {   
        $uid = $request->usernamereg;
        $email = $request->email;
        if (User::find($uid)) {
            return back()->withInput()->with('error' ,'Tai khoan da su dung');
        } else if (User::where('email', $email)->first()) {
            return back()->withInput()->with('error' ,'Email da su dung');
        } 
        else {
                $user = new User();
                $account = new Account();

                $account->uid = $request->usernamereg;
                $account->password = bcrypt($request->passwordreg);
                $account->status = 0;

                $user->uid = $request->usernamereg;
                $user->type = $request->type;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->birthday = date('Y-m-d', strtotime(str_replace('-', '/', $request->birthday)));
                $user->sex = $request->sex;
                $user->school = $request->school;
                $user->phone = $request->phone;
                $user->grade = $request->grade;
                //type =1 2 la gv hoac kdv
                if ($request->type == '1' || $request->type = '2') {
                    $id_subreg = $request->subjectreg;
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
                if (!empty($request->image)) {
                    $file = $request->file('image');
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
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
