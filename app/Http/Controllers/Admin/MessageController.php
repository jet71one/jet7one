<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->get();

        return view('admin.messages')->with(['users' => $users]);
    }

    public function getUserMessage($id = null)
    {
        $messages = Message::where('receiver', $id)->orWhere('user_id', $id)->orderBy('created_at')->get();

        Message::where('receiver', Auth::id())->update(['is_seen' => 1]);

        $returnedHtml = '';

        foreach ($messages as $message) {
            if ($message->receiver == $id) {
                $returnedHtml = $returnedHtml . '<div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>'. $message->message. '</p>
                                <span class="time_date">'. $message->created_at->format('H:i').'|'. $message->created_at->format('d.m.Y').'</span> </div>
            </div>';
            }
            else {
                $returnedHtml = $returnedHtml . '<div class="incoming_msg">
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'. $message->message. '</p>
                                    <span class="time_date">'. $message->created_at->format('H:i').'|'. $message->created_at->format('d.m.Y').'</span></div>
                            </div>
                        </div>';
            }

        }

        echo $returnedHtml;
    }

    public function send(Request $request) {

        try {
            $message = Message::create(['user_id' => Auth::id(), 'message' => $request->sms, 'receiver' => $request->receiver, 'is_seen' => 0]);
        }catch (\Exception $e) {
            return response()->json(['success' => 0, 'error' => $e->getMessage()]);
        }

        echo '<div class="outgoing_msg">
                            <div class="sent_msg">
                                <p>'. $message->message. '</p>
                                <span class="time_date">'. $message->created_at->format('H:i').'|'. $message->created_at->format('d.m.Y').'</span> </div>
            </div>';
    }

    public function getNew()
    {
        $newMessages = Message::where(['receiver' => Auth::id(), 'is_seen' => 0])
            ->select('user_id', DB::raw('COUNT(id) as count'))
            ->groupBy('user_id')
            ->get();

        $returnArray = [];

        foreach ($newMessages as $newMessage) {
            $returnArray[$newMessage->user_id] = $newMessage->count;
        }

        return response()->json($returnArray);
    }
}
