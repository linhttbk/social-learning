<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('admin.member', compact('totalUser', 'totalActive', 'user_pagination', 'key_search'));
    }

    public function deleteUser($uid){
        $user = User::find($uid);
        if(!$user) return redirect('admin-cp/members')->with('error', 'Không tồn tại người dùng');
        $user->delete();
        return redirect('admin-cp/members')->with('error', 'Xóa người dùng thành công');
    }

    public  function getEditUser(){
        return view('admin.member.edit-member');
    }

    public function postEditUser(){

    }

}
