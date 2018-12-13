<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function showAll()
    {
        $uid = Auth::user()->uid;
        $notifications = Notification::where('uid', $uid);
    }
}
