<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    public function index() {
        return view('questions');
    }
    // controller to return view and parameters
    public function addQuestion() {
        // only for logged in users (any member or admin)
        $post = ['topic' => 'Miscelaneous', 'question' => "What is the expected time complexity of the Quicksort algorithm?"];
        return view('addQuestion', ['post' => $post]);
    }
    // controller to return view and parameters
    public function updateQuestion(Request $request) {
        // only for owner or admin
        $data = $this->getQuestionByID($request['question_id']);
        $post = $data;
        if ($data != NULL) {
            $post = ['question_id' => $data->id, 'topic' => $data->topic, 'question' => $data->question];
        }
        return view('updateQuestion', ['post' => $post]);
    }
    public function closeQuestion(Request $request) {
        // mark question as closed
    }
    public function deleteQuestion(Request $request) {
        // only for owner or admin
        return view('questions');
    }
    public function view(Request $request) {
        $post = $this->getQuestionByID($request['question_id']);
        return view('question', ['post' => $post]);
    }
    // operation and validation for Model:Question insertion
    public function DBadd(Request $request) {
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
        return redirect('questions');
    }
    // operation and validation for Model:Question update
    public function DBupdate(Request $request) {
        $validatedData = $request->validate([
            'topic' => 'required',
            'question' => 'required',
        ]);
        $row = Question::find($request['question_id']);
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->question = $request['question'];
        }
        return redirect('questions/' . strval($request['question_id']));
    }
    // operation and validation for Model:Question 
    public function DBclose(Request $request) {
        $row = Question::find($request['question_id']);
        if ($row != NULL) {
            $row->status = 'closed';
        }
        return redirect('question/{question_id}');
    }
    public function getQuestionByID($question_id) {
        return Question::where('id', $question_id)->get()->first();
    }
}
