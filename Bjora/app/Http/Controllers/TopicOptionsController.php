<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\TopicOption;

class TopicOptionsController extends Controller
{
    /*
        index()
        Returns a view of all topics with admin controls
    */
    public function index() {
        // paginate all topics
        $topic = TopicOption::paginate(10);

        // returns view with data
        return view('topics', ['topic' => $topic]);
    }

    /*
        addTopic()
        Returns a form view for adding topics
    */
    public function addTopic() {
        // returns form view
        return view('addTopic', ['topic' => NULL]);
    }

    /*
        updateTopic(Request $request)
        Returns a form view for updating topic topic_id
    */
    public function updateTopic(Request $request) {
        // gets requested topic entry
        $topic = TopicOption::find($request['topic_id']);

        // returns form view with topic data
        return view('updateTopic', ['topic' => $topic]);
    }

    /*
        DBadd(Request $request)
        Validates and adds $request to 'topics'
        Redirects to 'topics' view
    */
    public function DBadd(Request $request) {
        // data add validation
        $validatedData = $request->validate([ 'topic' => 'required', ]);

        // add data to 'topics'
        TopicOption::create([ 'topic' => $request['topic'], ]);

        // redirect with success
        return redirect('topics')->with('success', 'Topic successfully added');
    }

    /*
        DBupdate(Request $request)
        Validates and updates $request on 'topics'
        Redirects to 'topics' view
    */
    public function DBupdate(Request $request) {
        // data update validation
        $validatedData = $request->validate([ 'topic' => 'required', ]);

        // gets requested topic entry
        $row = TopicOption::find($request['topic_id']);

        // updates entry if found
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->save();
        }

        // redirect with success
        return redirect('topics')->with('success', 'Topic successfully updated');
    }

    /*
        DBdelete(Request $request)
        Deletes $request on 'topics'
        Redirects to 'topics' view
    */
    public function DBdelete(Request $request) {
        // gets requested topic entry
        $row = TopicOption::find($request['topic_id']);

        // deletes entry if found
        if ($row != NULL) {
            $row->delete();
        }

        // redirect with success
        return redirect('topics')->with('success', 'Topic successfully deleted');
    }
}