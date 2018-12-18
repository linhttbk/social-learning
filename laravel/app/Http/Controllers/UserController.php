<?php

namespace App\Http\Controllers;

use App\Classes\ActivationService;
use App\Models\Account;
use App\Models\User;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    protected $activationService;

    public function connect()
    {
        if (DB::connection()->getDatabaseName()) {
            $user = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')->get();
            $totalUser = $user->count();
            $totalActive = 0;
            foreach ($user as $data) {
                echo $data->name . ' ' . $data->status;
                if ($data->status == 1) {
                    $totalActive++;
                }
            }
            // var_dump($user);

            return $totalActive . ' ' . $totalUser;

        }
    }

    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }

    public function showAllUsers()
    {
        $user = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')->get();
        $totalUser = $user->count();
        $totalActive = 0;
        foreach ($user as $data) {
            if ($data->status == 1) {
                $totalActive++;
            }
        }

        $user_pagination = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')->paginate(10);
        return view('admin.member.member', compact('totalUser', 'totalActive', 'user_pagination'));
    }

    public function searchUser(Request $request)
    {
        $user = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')->get();
        $totalUser = $user->count();
        $totalActive = 0;
        foreach ($user as $data) {
            if ($data->status == 1) {
                $totalActive++;
            }
        }

        $key_search = $request->input('key-search');
        $user_pagination = DB::table('User')->join('Account', 'User.uid', '=', 'Account.uid')
            ->where('User.uid', 'like', '%' . $key_search . '%')
            ->orWhere('name', 'like', '%' . $key_search . '%')
            ->orWhere('email', 'like', '%' . $key_search . '%')
            ->paginate(10);
        return view('admin.member.member', compact('totalUser', 'totalActive', 'user_pagination', 'key_search'));
    }

    public function deleteUser($uid)
    {
        $user = User::find($uid);
        if (!$user) return redirect('admin-cp/members')->with('error', 'Không tồn tại người dùng');
        $user->delete();
        return redirect('admin-cp/members')->with('error', 'Xóa người dùng thành công');
    }

    public function getEditUser($uid)
    {
        $user = User::find($uid);
        $subject = DB::table('Subject')->get();
        return view('admin.member.edit-member', ['user' => $user, 'subject' => $subject, 'action' => 0]);
    }

    public function postEditUser($uid, Request $request)
    {


//        dd(\Illuminate\Support\Facades\File::exists($request->img_currenrt));
        $user = User::find($uid);
        $account = Account::find($uid);
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->phone = $request->phone;
        $user->birthday = date("Y-m-d", strtotime($request->birthday));
        $user->email = $request->email;
        $user->school = $request->school;
        if ($request->changPassword == "on") {
            $account->password = bcrypt($request->password);
        }
        if (!empty($request->image)) {
            $currentAvatar = $user->avatar;
            $file = $request->file('image');
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $filePath = 'images/' . $imageName;
            if (!empty($currentAvatar)) Storage::disk('s3')->delete($currentAvatar);
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            $imageSave = 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/' . $imageName;
            $user->avatar = $imageSave;
        } else {
            echo "Không có file";
        }
        $user->save();
        $account->save();
        return redirect('admin-cp/members')->with('error', 'Cập nhật thành công');
    }

    function addUser(Request $request)
    {
        $uid = $request->usernamereg;
        $email = $request->email;
        if (User::find($uid)) {
            return back()->withInput()->with('error' ,'Tai khoan da su dung');
        } else if (User::where('email', $email)->first()) {
            return back()->withInput()->with('error' ,'Email da su dung');
        } else {
            $user = new User();
            $account = new Account();

            $account->uid = $uid;
            $account->password = bcrypt($request->passwordreg);
            $account->status = 0;

            $user->uid = $uid;
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
            return back()->with('success', "Yeu cau nguoi dung xác thực email để kích hoạt tài khoản");
        }

    }
}
