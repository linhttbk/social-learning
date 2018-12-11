<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
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

    public function __construct()
    {

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
        $subject = DB::table('subject')->get();
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
            $file_name = $request->file("image")->getClientOriginalName();
            $user->avatar = $file_name;
            $request->file("image")->move("upload/avatar/", $file_name);
            if (File::exists($request->img_currenrt)) {
                File::delete($request->img_currenrt);
            }
        }
        else
        {
            echo "Không có file";
        }
        $user->save();
        $account->save();
        return redirect('admin-cp/members')->with('error', 'Cập nhật thành công');
        }
}
