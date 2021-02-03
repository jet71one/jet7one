<?php

namespace Wave\Http\Controllers;

use Wave\Page;
use Wave\User;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends \App\Http\Controllers\Controller
{
    public function index(){
        // $users = User::all();
        // $count = 0;
        // foreach($users as $user){
        //     // dd($user->notifications();
        //     dd(auth()->user()->notifications());
          
        // }
        

        $show_all_notifications = Notification::all();
        // dd($show_all_notifications);
        // return view('theme::notifications.index');
        return view('theme::notifications.index',compact('show_all_notifications'));
    }

    public function delete(Request $request, $id){
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification){
            $notification->delete();
            return response()->json(['type' => 'success', 'message' => 'Marked Notification as Read', 'listid' => $request->listid]);
        }
        else {
            return response()->json(['type' => 'error', 'message' => 'Could not find the specified notification.']);
        }
    }
}
