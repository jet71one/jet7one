<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        if(Auth::guest()) {
            return response()->json(['success' => 0, 'code' => 401]);
        }
        $newMessage = new Message();

        $newMessage->message = $request->message;
        $newMessage->user_id = auth()->user()->id;
        $newMessage->receiver = (auth()->user()->isAdmin()) ? $request->reciever : 1;

        $newMessage->save();

        return response()->json(['success' => 1, 'message' => $request->message, 'code' => 200]);
    }

    public function getAll()
    {
        try {
            if(Auth::check()) {
                $id = Auth::id();
                $messages = Message::where('user_id', $id)->orWhere('receiver', $id)->orderBy('created_at')->get();

                return $messages;
            }
        }catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    public function makeAllSeen()
    {
        $id = Auth::id();

        Message::where('receiver', $id)->update(['is_seen' => 1]);
    }

    public function getNew()
    {
        $id = Auth::id();

        $response = [
          'hasNew' => 0,
          'messages' => []
        ];

        $messages = Message::where(['receiver' => $id, 'is_seen' => 0])->get();
        Message::where('receiver', $id)->update(['is_seen' => 1]);

        if ($messages->count() > 0) {
            $response['hasNew'] = 1;
            $response['messages'] = $messages;
        }

        return response()->json($response);
    }

}
