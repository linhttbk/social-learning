<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use App\Models\GroupRequest;
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
        $listRequestGroups = $user->myRequestGroups;
        $listOtherGroups = GroupUser::whereNotIn('id', function ($query) {
            $query->select('id_group')->from('GroupMember')->where('uid', '=', (Auth::user()->user)->uid);
        })->whereNotIn('id', function ($query) {
            $query->select('id_group')->from('GroupRequest')->where('uid', '=', (Auth::user()->user)->uid)->where('status', '=', 0);
        })->get();
        return view('group.group_page', ['listGroups' => $listGroups, 'listJoinGroups' => $listJoinGroups
            , 'listOtherGroups' => $listOtherGroups, 'listRequestGroups' => $listRequestGroups]);
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

    function requestGroups($id)
    {
        $groupRequest = new GroupRequest();
        $groupRequest->uid = Auth::user()->uid;
        $groupRequest->id_group = $id;
        if (GroupRequest::where('uid', '=', Auth::user()->uid)->where('id_group', '=', $id)->first()) {
            return back()->withInput()->with('error', 'Co loi khi gui yeu cau, vui long thu lai sau!.');
        }
        $groupRequest->request_time = Carbon::now();
        $groupRequest->status = 0;
        if ($groupRequest->save()) {
            return back()->withInput()->with('success', 'Hay cho admin cua nhom chap nhan yeu cau cua ban.');
        } else {
            return back()->withInput()->with('error', 'Co loi khi gui yeu cau, vui long thu lai sau!');
        }
    }
}
