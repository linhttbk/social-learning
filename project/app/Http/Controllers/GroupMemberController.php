<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use App\Models\GroupUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupMemberController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }

    function showGroups()
    {
        $user = Auth::user()->user;
        $listGroups = $user->myGroups;
        $listJoinGroups = $user->myJoinGroups;
        $listOtherGroups = GroupUser::whereNotIn('id', function ($query) {
            $query->select('id_group')->from('GroupMember')->where('uid', '=', (Auth::user()->user)->uid);
        })->get();
        return view('group.group_page', ['listGroups' => $listGroups, 'listJoinGroups' => $listJoinGroups, 'listOtherGroups' => $listOtherGroups]);
    }

    function showMyGroup($idGroup)
    {

        return view('group.my_group');
    }


    function create(Request $request)
    {

        $groupUser = new GroupUser();
        $groupUser->title = $request->title;
        $groupUser->des = $request->description;
        $groupUser->uid = Auth::user()->uid;
        $groupUser->group_create_at = Carbon::now();
        $groupUser->mode = $request->mode;
        $groupMember = new GroupMember();
        $groupMember->uid = Auth::user()->uid;
        $groupMember->add_uid = Auth::user()->uid;
        $groupMember->join_date = $groupUser->group_create_at;
        $groupMember->role = 2;
        if ($groupUser->save() && $groupUser->groupMember()->save($groupMember)) {
            return redirect()->route('my_group', ['groupId' => $groupUser->id]);
        } else {
            return back()->withErrors('message', 'Co loi trong qua trinh tao nhom');
        }
    }
}
