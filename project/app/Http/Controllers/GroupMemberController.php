<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use App\Models\GroupUser;
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

//        $listOtherGroups = DB::table('GroupUser')->whereNotIn('id', function ($query) {
//            $query->select('id_group')->from('GroupMember')->where('uid', '=', (Auth::user()->user)->uid);
//        })->get();

        $listOtherGroups = GroupUser::whereNotIn('id', function ($query) {
            $query->select('id_group')->from('GroupMember')->where('uid', '=', (Auth::user()->user)->uid);
        })->get();
        $count1 = $listGroups->count();
        $count2 = $listJoinGroups->count();
        $count3 = $listOtherGroups->count();
        $resultGroups = $listGroups->chunk($count1 % 2 == 0 ? $count1 / 2 : $count1 / 2 + 1);
        $resultJoinGroup = $listJoinGroups->chunk($count2 % 2 == 0 ? $count2 / 2 : $count2 / 2 + 1);
        $resultOther = $listOtherGroups->chunk($count3 % 2 == 0 ? $count3 / 2 : $count3 / 2 + 1);
        //dd($listOtherGroups);
        return view('group.group_page', ['listGroups' => $listGroups, 'listJoinGroups' => $listJoinGroups, 'listOtherGroups' => $listOtherGroups]);
    }

    function showMyGroup($idGroup)
    {
        return view('group.my_group');
    }

    function partition($list, $p)
    {
        $listlen = count($list);
        $partlen = floor($listlen / $p);
        $partrem = $listlen % $p;
        $partition = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition[$px] = array_slice($list, $mark, $incr);
            $mark += $incr;
        }
        return $partition;
    }
}
