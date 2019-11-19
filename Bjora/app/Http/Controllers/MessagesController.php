<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\Message;
use Auth;

class MessagesController extends Controller
{
    /*
        Controller to return user's messages view
    */
    public function index() {
        // gets logged in users's messages (where user is recipient)
        $message = Message::where('recipient_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        // returns view with data
        return view('messages', ['user' => Auth::user(), 'message' => $message]);
    }

    /*
        DBadd(Request $request)
        Validates and adds $request to 'messages'
        Redirects to 'users/user_id' (recipient's profile page)
    */
    public function DBadd(Request $request) {
        // validation for message data
        $validatedData = $request->validate([
            'user_id' => 'required',                // there must be a recipient
            'message' => 'required',                // there must be a message
        ]);
        
        // adds data to 'messages'
        Message::create([
            'recipient_id' => $request['user_id'],
            'sender_id' => Auth::user()->id,
            'message' => $request['message'],
        ]);

        // redirects with success
        return redirect('users/' . $request['user_id'])->with('success', 'Message successfully sent');
    }

    /*
        DBdelete(Request $request)
        Deletes $request on 'messages'
    */
    public function DBdelete(Request $request) {
        // gets requested message entry
        $row = Message::find($request['message_id']);

        // deletes entry if found
        if ($row != NULL) {
            $row->delete();
        }

        // redirects with success
        return redirect('messages')->with('success', 'Message successfully deleted');
    }
}
