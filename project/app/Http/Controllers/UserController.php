<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function connect(){
        if (DB::connection()->getDatabaseName()) {
            $user = User::all();
            var_dump(json_encode($user));
            return "Hello";

        }
    }
    public function __construct()
    {

    }

    public function showAllUsers(){
        $user = User::all();
        $user_pagination = DB::table('User')->paginate(10);
        return view('admin.member',compact('user','user_pagination'));
    }
    public function searchUser(Request $request){
            $user = User::all();
            $key_search = $request->input('key-search');
            $user_pagination = DB::table('user')->where('uid','like','%'.$key_search.'%')
                                                ->orWhere('name','like','%'.$key_search.'%')
                                                ->orWhere('email','like','%'.$key_search.'%')

            ->paginate(10);
           return view('admin.member',compact('user','user_pagination','key_search'));
    }
}
