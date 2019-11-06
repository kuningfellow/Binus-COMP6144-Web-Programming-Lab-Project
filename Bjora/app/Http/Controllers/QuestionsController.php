<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\TopicOption;
use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    // controller to view paginated index
    public function index() {
        $question = Question::paginate(1);
        return view('questions', ['question' => $question]);
    }
    // controller to view searched question or username
    public function search(Request $request) {
        $question = Question::whereHas('owner', function($q) use ($request) {
            $q->where('name', 'LIKE', '%'.$request['search'].'%');
        })->orWhere('question', 'LIKE', '%'.$request['search'].'%')->paginate(1);
        return view('search', ['question' => $question]);
    }
    // controller to view single questions
    public function view(Request $request) {
        $question = Question::find($request['question_id']);
        return view('question', ['question' => $question]);
    }
    public function myQuestions() {
        $question = Question::where('owner_id', Auth::user()->id)->paginate(1);
        return view('myQuestions', ['question' => $question]);
    }
    public function manageQuestions() {
        $question = Question::paginate(1);
        return view('manageQuestions', ['question' => $question]);
    }
    // controller to return addQuestion view
    public function addQuestion() {
        $topic = $this->getTopicOption();
        return view('addQuestion', ['question' => NULL, 'topic' => $topic]);
    }
    // controller to return updateQuestion view
    public function updateQuestion(Request $request) {
        $question = Question::find($request['question_id']);
        $topic = $this->getTopicOption();
        return view('updateQuestion', ['question' => $question, 'topic' => $topic]);
    }

    /*
        Validates and does Model:Question insertions
        redirects to 'questions/'
    */
    public function DBadd(Request $request) {
        $request['owner_id'] = Auth::user()->id;
        $validatedData = $request->validate([ 'owner_id' => 'required', 'topic' => 'required', 'question' => 'required', ]);
        Question::create([ 'owner_id' => $request['owner_id'], 'status' => 'open', 'topic' => $request['topic'], 'question' => $request['question'], ]);
        return redirect('questions');
    }
    /*
        Validates and does Model:Question updates
        redirects to 'questions/{question_id}'
    */
    public function DBupdate(Request $request) {
        $validatedData = $request->validate([ 'topic' => 'required', 'question' => 'required', ]);
        $row = Question::find($request['question_id']);
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->question = $request['question'];
            $row->save();
        }
        return redirect('questions/' . $request['question_id'])->with('success', 'Question successfully updated');
    }
    /*
        Validates and does Model:Question 'status' closing
        redirects to 'questions/{question_id}'
    */
    public function DBclose(Request $request) {
        $row = Question::find($request['question_id']);
        if ($row != NULL) {
            $row->status = 'closed';
            $row->save();
        }
        return redirect('questions/' . $request['question_id'])->with('success', 'Question successfully closed');
    }
    /*
        Validates and does Model:Question deletions
        redirects to 'questions/'
    */
    public function DBdelete(Request $request) {
        $row = Question::find($request['question_id']);
        if ($row != NULL) {
            $row->delete();
        }
        return redirect('questions')->with('success', 'Question successfully deleted');
    }

    // Gets selection
    public function getTopicOption() {
        return TopicOption::get('topic');
    }
}
