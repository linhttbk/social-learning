<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function showProfileUser($id){
             return view('member.profile.my_profile');
    }
}