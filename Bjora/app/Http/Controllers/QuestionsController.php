<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    public function addQuestion() {
        // only for logged in users (any member or admin)
        return view('addQuestion');
    }
    public function editQuestion() {
        // do some DB update
        // only for owner or admin
    }
    public function deleteQuestion() {
        // do some DB delete
        // only for owner or admin
    }
    public function questionID() {
        return view('question');
    }
    public function index() {
        return view('questions');
    }
    public function update(Request $request) {
        // validator for Model:Question data updates
        // also does the DB updates
        // just send the form to this controller
        $request['owner'] = NULL;
        if (Auth::user()) {
            $request['owner'] = Auth::user()->id;
        }
        $validatedData = $request->validate([
            'owner' => 'required',
            'topic' => 'required',
            'question' => 'required',
        ]);
        Question::create([
            'owner' => $request['owner'],
            'status' => 'open',
            'topic' => $request['topic'],
            'question' => $request['question'],
        ]);
        return redirect('questions', ['message' => 'Question Successfully added']);
    }
}
