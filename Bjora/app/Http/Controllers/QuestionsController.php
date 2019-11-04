<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    public function addQuestion() {
        // only for logged in users (any member or admin)
        $post = ['topic' => 'Miscelaneous', 'question' => "What is the expected time complexity of the Quicksort algorithm?"];
        \Log::info($post);
        return view('aditQuestion', ['form_title' => 'New Question', 'post' => $post]);
    }
    public function editQuestion(Request $request) {
        // only for owner or admin
        $data = Question::where('id', $request['question_id'])->get(['topic', 'question'])->first();
        $post = ['topic' => $data->topic, 'question' => $data->topic];
        return view('aditQuestion', ['form_title' => 'Edit Question', 'post' => $post]);
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
