<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use App\Models\GroupRequest;
use App\Models\GroupUser;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $group = GroupUser::find($idGroup);
//        $listPost = $group->getListPost()->get();
        $listPost = $group->myListPost;
        $listRequest = DB::table('GroupRequest')->where('id_group', $idGroup)->where('status', 0)->get();
        return view('group.my_group', ['listPost' => $listPost, 'id_group' => $idGroup, 'listRequest' => $listRequest, 'group' => $group]);
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

    function cancelRequestGroup($groupId)
    {
        $groupRequest = GroupRequest::where('id_group', $groupId);
        if ($groupRequest->delete()) {
            return back()->withInput()->with('success', 'Huy thanh cong');
        } else {
            return back()->withInput()->with('error', 'Huy that bai');
        }


    }

    function quitGroup($groupId)
    {
        $uid = Auth::user()->uid;
        $groupMember = GroupMember::where('uid', $uid)->where('id_group', $groupId);
        $groupRequest = GroupRequest::where('uid', $uid)->where('id_group', $groupId)->where('status', 1);
        $groupMember->delete();
        $groupRequest->delete();
        return back()->withInput()->with('success', 'Thoat nhom thanh cong');
    }

    function gotoSetting($groupId)
    {
        $uid = Auth::user()->uid;
        if (!GroupMember::where('uid', $uid)->where('id_group', $groupId)->where('role', 2)->first()) {
            return redirect('home');
        } else {
            return back()->withInput()->with('error', 'Ban khong co quyen chinh sua nhom nay!');
        }
    }

    function postData(Request $request, $id_group)
    {
        $post = new Post();
        $post->content = $request->data_post;
        $post->uid = Auth::user()->uid;
        $post->id_group = $id_group;

        $post->create_at = Carbon::now();
        if (!empty($request->file)) {
            if ($request->file('file')->getClientSize() > 1048576) {
                return back()->with('error', 'File dung lượng quá lớn');
            }
            $file = $request->file('file');
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $filePath = 'document/' . $imageName;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            $imageSave = 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/document/' . $imageName;
            $post->url_attach = $imageSave;
        }
        $post->save();

        return back()->with('success', 'Đăng bài thành công');
    }

    function showUserGroup($groupId)
    {
        $groupUser = GroupUser::find($groupId);
        if (!empty($groupUser)) {
            $adminGroup = $groupUser->owner;
            $groupMember = $groupUser->members;
            $countMember = count($groupUser->groupMember);
            return view('group.user_my_group', [
                'adminGroup' => $adminGroup,
                'groupMember' => $groupMember,
                'countMember' => $countMember,
                'groupId' => $groupId
            ]);
        }

        return view('group.user_my_group');
    }

    function acceptRequestGroups(Request $request)
    {
        $update = DB::table('GroupRequest')->where('id', $request->id)->update(['status' => 1]);

        if ($update) {
            $groupRequest = GroupRequest::find($request->id);
            $groupMember = new GroupMember();
            $groupMember->id_group = $groupRequest->id_group;
            $groupMember->uid = $groupRequest->uid;
            $groupMember->add_uid = Auth::user()->uid;
            $groupMember->role = 0;
            $groupMember->join_date = Carbon::now();
            $groupMember->save();
            return back()->withInput()->with('success', 'Chấp nhận yêu cầu thành công');
        } else {
            return back()->withInput()->with('error', 'Đã có lỗi xảy ra.Vui lòng thử lại sau');
        }
    }

    function acceptAllRequestGroups(Request $request)
    {
        $accept = DB::table('GroupRequest')->where('id_group', '=', $request->idGroup)->where('status', 0)->update(['status' => 1]);
        if ($accept) {
            $listRequest = $request->listRequest;
            foreach ($listRequest as $data){
                $groupRequest = GroupRequest::find($data->id);
                $groupMember = new GroupMember();
                $groupMember->id_group = $groupRequest->id_group;
                $groupMember->uid = $groupRequest->uid;
                $groupMember->add_uid = Auth::user()->uid;
                $groupMember->role = 0;
                $groupMember->join_date = Carbon::now();
                $groupMember->save();
            }

            return back()->withInput()->with('success', 'Chấp nhận yêu cầu thành công');
        } else {
            return back()->withInput()->with('error', 'Đã có lỗi xảy ra.Vui lòng thử lại sau');
        }
    }

    function destroyRequestGroups(Request $request)
    {
        $delete = DB::table('GroupRequest')->where('id', $request->id)->where('status', 0)->delete();
        if ($delete) {
            return back()->withInput()->with('success', 'Xóa yêu cầu thành công');
        } else {
            return back()->withInput()->with('error', 'Đã có lỗi xảy ra.Vui lòng thử lại sau');
        }
    }


}
