<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function destroy(Request $request)
    {
        $notifications = [];

        if ($request->has('notifications')){
            $notifications = $request->input('notifications');
            DatabaseNotification::whereIn('id', $notifications)->delete();
        }
        return redirect()->back();
    }
}
