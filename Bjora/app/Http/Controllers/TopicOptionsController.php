<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\TopicOption;

class TopicOptionsController extends Controller
{
    public function index() {
        $topic = TopicOption::paginate(10);
        return view('topics', ['topic' => $topic]);
    }
    public function addTopic() {
        return view('addTopic', ['topic' => NULL]);
    }
    public function updateTopic(Request $request) {
        $topic = TopicOption::find($request['topic_id']);
        return view('updateTopic', ['topic' => $topic]);
    }

    public function DBadd(Request $request) {
        $validatedData = $request->validate([ 'topic' => 'required', ]);
        TopicOption::create([ 'topic' => $request['topic'], ]);
        return redirect('topics')->with('success', 'Topic successfully added');
    }
    public function DBupdate(Request $request) {
        $validatedData = $request->validate([ 'topic' => 'required', ]);
        $row = TopicOption::find($request['topic_id']);
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->save();
        }
        return redirect('topics')->with('success', 'Topic successfully updated');
    }
    public function DBdelete(Request $request) {
        $row = TopicOption::find($request['topic_id']);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('topics')->with('success', 'Topic successfully deleted');
    }
}