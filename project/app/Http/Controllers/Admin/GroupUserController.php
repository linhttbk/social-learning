<?php

namespace App\Http\Controllers\Admin;

use App\Models\GroupUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GroupUserController extends Controller
{
    //


    public function showAllGroupUser()
    {

        return view('admin.group');
    }
}
