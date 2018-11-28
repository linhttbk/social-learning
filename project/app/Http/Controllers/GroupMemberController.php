<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupMemberController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    function showGroups()
    {
        return view('group.group_page');
    }
    function showMyGroup($idGroup){
        return view('group.my_group');
    }
}
