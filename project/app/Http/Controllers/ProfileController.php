<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfileUser($id){
        $user = DB::table('User')->where('uid', $id)->get();
//        dd($user);
             return view('member.profile.my_profile', compact('user'));
    }
}