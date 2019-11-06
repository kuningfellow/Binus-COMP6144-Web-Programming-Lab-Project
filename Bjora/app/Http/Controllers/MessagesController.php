<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\Message;
use Auth;

class MessagesController extends Controller
{
    public function index() {
        $message = Message::where('recipient_id', Auth::user()->id)->get();
        return view('messages', ['user' => Auth::user(), 'message' => $message]);
    }
    public function DBadd(Request $request) {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);
        Message::create([
            'recipient_id' => $request['user_id'],
            'sender_id' => Auth::user()->id,
            'message' => $request['message'],
        ]);
        return redirect('profiles/' . $request['user_id'])->with('success', 'Message successfully sent');
    }
    public function DBdelete(Request $request) {
        $row = Message::find($request['message_id']);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('messages')->with('success', 'Message successfully deleted');
    }
}
