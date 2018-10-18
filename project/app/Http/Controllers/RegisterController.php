<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Classes\ActivationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
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

    public function regis(Request $req){
    	
        $rules = array('email' => 'unique:user,email',
                        'uid'=>'unique:user,uid');
        if (Validator::make(Input::all(), $rules)->fails()) {
            return redirect('login')->with('exist','tai khoan da su dung');
        }
        else {
            $user=new User();
            $account=new Account;
            
            $account->uid=$req->usernamereg;
            $account->password=$req->passwordreg;

        	$user->uid=$req->usernamereg;
            $user->type=$req->type;
        	$user->name=$req->name;
        	$user->email=$req->email;
        	$user->birthday=date('Y-m-d', strtotime(str_replace('-', '/', $req->birthday)));
        	$user->sex=$req->sex;
        	$user->school=$req->school;
            $user->phone=$req->phone;
        	$user->grade=$req->grade;
            //type =1 2 la gv hoac kdv
            if($req->type=='1'||$req->type='2'){
                $id_subreg=$req->subjectreg;
                if($id_subreg=="Toán")
                    $user_detail->id_sr=1;
                else if($id_subreg=="Lý")
                    $user_detail->id_sr=2;
                else if($id_subreg=="Hóa")
                    $user_detail->id_sr=3;
                else if($id_subreg=="Tiếng Anh")
                    $user_detail->id_sr=4;
                else if($id_subreg=="Ngữ Văn")
                    $user_detail->id_sr=5;
            }
            $user->save();
            $account->save();
            $this->activationService->sendActivationMail($user);
            return redirect('login')->with('sucess',"Xác thực email để kích hoạt tài khoản");
        }
    }    
     public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect('/login');
        }
        abort(404);
    }
}
