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
        $results = DB::table('GroupUser')->select(array('GroupUser.*','User.name','User.avatar',DB::raw('(Select count(*) from Post where Post.id_group = GroupUser.id) as posts')
        ,DB::raw('(Select count(*) from GroupMember where GroupMember.id_group = GroupUser.id) as members')))
            ->join('User','GroupUser.uid','=','User.uid')->paginate(4)->setPath(route('group-user'));
        return view('admin.group', ['results' => $results]);
    }

    public function deleteGroups(Request $request)
    {
        $listIdGroup = $request->listIdGroup;
        foreach ($listIdGroup as $idGroup){
            GroupUser::where('id','=',$idGroup)->delete();
        }
        $results = DB::table('GroupUser')->select(array('GroupUser.*','User.name','User.avatar',DB::raw('(Select count(*) from Post where Post.id_group = GroupUser.id) as posts')
            ,DB::raw('(Select count(*) from GroupMember where GroupMember.id_group = GroupUser.id) as members')))
            ->join('User','GroupUser.uid','=','User.uid')->paginate(4)->setPath(route('group-user'));
       // return response()->json(['success' => $listIdGroup, 'data' => $results,'link'=>(string)$results->links()]);
        return view('admin.group', ['results' => $results]);
    }
    public function showAllPublicGroups(Request $request){
        $results = DB::table('GroupUser')->select(array('GroupUser.*','User.name','User.avatar',DB::raw('(Select count(*) from Post where Post.id_group = GroupUser.id) as posts')
        ,DB::raw('(Select count(*) from GroupMember where GroupMember.id_group = GroupUser.id) as members')))
            ->join('User','GroupUser.uid','=','User.uid')
            ->where('mode','=',0)->paginate(4)->setPath(route('group-user'));
        return view('admin.group', ['results' => $results]);
    }
    public function showAllPrivateGroups(Request $request){
        $results = DB::table('GroupUser')->select(array('GroupUser.*','User.name','User.avatar',DB::raw('(Select count(*) from Post where Post.id_group = GroupUser.id) as posts')
        ,DB::raw('(Select count(*) from GroupMember where GroupMember.id_group = GroupUser.id) as members')))
            ->join('User','GroupUser.uid','=','User.uid')
            ->where('mode','=',1)->paginate(4)->setPath(route('group-user'));
        return view('admin.group', ['results' => $results]);
    }
}
