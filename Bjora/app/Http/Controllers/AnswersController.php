<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Answer;
use Auth;

class AnswersController extends Controller
{
    /*
        Controller to return 'answers' update view
    */
    public function update(Request $request) {
        // finds the data with 'answer_id'
        $answer = Answer::find($request['answer_id']);
        // returns view with the data
        return view('updateAnswer', ['answer' => $answer]);
    }

    /*
        DBadd(Request $request)
        Validates and adds $request to 'answers'
        Redirects to 'questions/question_id' (answered question page)
    */
    public function DBadd(Request $request) {
        // sets the current login session as 'owner_id'
        $request['owner_id'] = Auth::user()->id;

        // data add validation
        $validatedData = $request->validate([
            'question_id' => 'required',
            'owner_id' => 'required',
            'answer' => 'required',
        ]);

        // add data to 'answers'
        Answer::create([
            'question_id' => $request['question_id'],
            'owner_id' => $request['owner_id'],
            'answer' => $request['answer'],
        ]);

        // redirect with success
        return redirect('questions/' . $request['question_id'])->with('success', 'Answer successfully added');
    }

    /*
        DBupdate(Request $request)
        Validates and updates $request on 'answers'
        Redirects to 'questions/question_id' (updated answer's question page)
    */
    public function DBupdate(Request $request) {
        // data update validation
        $validatedData = $request->validate([
            'answer' => 'required',
        ]);

        // gets requested data entry
        $row = Answer::find($request['answer_id']);

        // edits the data if found
        if ($row != NULL) {
            $row->question_id = $request['question_id'];
            $row->answer = $request['answer'];
            $row->save();
        }

        // redirect with success
        return redirect('questions/' . $request['question_id'])->with('success', 'Answer successfully updated');
    }

    /*
        DBdelete(Request $request)
        Validates and deletes $request on 'answers'
        Redirects to 'questions/question_id' (deleted answer's question page)
    */
    public function DBdelete(Request $request) {
        // gets requested data entry
        $row = Answer::find($request['answer_id']);

        // deletes the data if found
        if ($row != NULL) {
            $row->delete();
        }

        // redirects with success
        return redirect('questions/' . $request['question_id'])->with('success', 'Answer successfully deleted');
    }
}
