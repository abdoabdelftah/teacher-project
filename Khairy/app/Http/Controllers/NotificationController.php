<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function markAsReadAdmin(Request $request)
    {
        auth()->guard('admin')->user()->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }

    public function markAsReadUser(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();

        return response()->json(['success' => true]);
    }

}
