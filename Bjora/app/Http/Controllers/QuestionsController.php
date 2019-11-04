<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    // controller to view paginated index
    public function index() {
        $post = Question::paginate(1);
        return view('questions', ['post' => $post]);
    }
    // controller to view single questions
    public function view(Request $request) {
        $post = $this->getQuestionByID($request['question_id']);
        return view('question', ['post' => $post]);
    }
    // controller to return addQuestion view
    public function addQuestion() {
        $post = ['topic' => 'Miscelaneous', 'question' => "What is the expected time complexity of the Quicksort algorithm?"];
        return view('addQuestion', ['post' => $post]);
    }
    // controller to return updateQuestion view
    public function updateQuestion(Request $request) {
        $data = $this->getQuestionByID($request['question_id']);
        $post = ['question_id' => $data->id, 'topic' => $data->topic, 'question' => $data->question];
        return view('updateQuestion', ['post' => $post]);
    }
    /*
        Validates and does Model:Question insertions
        redirects to 'questions/'
    */
    public function DBadd(Request $request) {
        $request['owner'] = NULL;
        if (Auth::user()) { $request['owner'] = Auth::user()->id; }
        $validatedData = $request->validate([ 'owner' => 'required', 'topic' => 'required', 'question' => 'required', ]);
        Question::create([ 'owner' => $request['owner'], 'status' => 'open', 'topic' => $request['topic'], 'question' => $request['question'], ]);
        return redirect('questions');
    }
    /*
        Validates and does Model:Question updates
        redirects to 'questions/{question_id}'
    */
    public function DBupdate($question_id, Request $request) {
        $validatedData = $request->validate([ 'topic' => 'required', 'question' => 'required', ]);
        $row = Question::find($question_id);
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->question = $request['question'];
            $row->save();
        }
        return redirect('questions/' . $question_id);
    }
    /*
        Validates and does Model:Question 'status' closing
        redirects to 'questions/{question_id}'
    */
    public function DBclose($question_id, Request $request) {
        $row = Question::find($question_id);
        if ($row != NULL) {
            $row->status = 'closed';
            $row->save();
        }
        return redirect('questions/' . $question_id);
    }
    /*
        Validates and does Model:Question deletions
        redirects to 'questions/'
    */
    public function DBdelete($question_id, Request $request) {
        $row = Question::find($question_id);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('questions');
    }
    // Gets a single row by the ID
    public function getQuestionByID($question_id) {
        return Question::where('id', $question_id)->get()->first();
    }
}
