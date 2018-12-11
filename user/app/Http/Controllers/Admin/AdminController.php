<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function checkLogin(): JsonResponse
    {
        if (Auth::guard('admin')->check()) {
            $data['isLogin'] = 1;
            $data['admin'] = Auth::guard('admin')->user();
            return new JsonResponse($data, 200);
        } else {
            $data['isLogin'] = 0;
            return new JsonResponse($data, 200);
        }
    }

    public function doLogin(Request $request)
    {


        if (Auth::guard('admin')->attempt(['uid' => $request->get('uid'), 'password' => $request->get('password')])) {
            $user = Auth::guard('admin')->user();
            $tokenResult = $user->createToken('Personal Access Token');
           // dd($tokenResult);
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addYear(10);

            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken, 'user' => $user], 200);

        } else {
            return response()->json([
                'message' => 'Tài khoản hoặc mật khẩu không đúng'
            ], 200);
        }
    }
}
