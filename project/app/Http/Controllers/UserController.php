<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

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
}
