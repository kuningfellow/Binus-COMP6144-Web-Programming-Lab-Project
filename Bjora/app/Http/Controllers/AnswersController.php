<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Answer;
use Auth;

class AnswersController extends Controller
{
    public function update(Request $request) {
        $answer = Answer::find($request['answer_id']);
        return view('updateAnswer', ['answer' => $answer]);
    }
    public function DBadd(Request $request) {
        $request['owner_id'] = Auth::user()->id;
        $validatedData = $request->validate([ 'question_id' => 'required', 'owner_id' => 'required', 'answer' => 'required', ]);
        Answer::create([ 'question_id' => $request['question_id'], 'owner_id' => $request['owner_id'], 'answer' => $request['answer'], ]);
        return redirect('questions/' . $request['question_id']);
    }
    public function DBupdate(Request $request) {
        $validatedData = $request->validate([ 'answer' => 'required', ]);
        $row = Answer::find($request['answer_id']);
        if ($row != NULL) {
            $row->question_id = $request['question_id'];
            $row->answer = $request['answer'];
            $row->save();
        }
        return redirect('questions/' . $request['question_id']);
    }
    public function DBdelete(Request $request) {
        $row = Answer::find($request['id']);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('questions/' . $request['question_id']);
    }
}
