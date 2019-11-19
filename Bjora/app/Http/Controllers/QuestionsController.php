<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

use Bjora\TopicOption;
use Bjora\Question;
use Auth;

class QuestionsController extends Controller
{
    /*
        index(Request $request)
        $request['search'] = the search string
        Returns view('questions') with paginated searched data
    */
    public function index(Request $request) {
        // filters searched data
        $question = Question::whereHas('owner', function($q) use ($request) {
            $q->where('name', 'LIKE', '%'.$request['search'].'%');
        })->orWhere('question', 'LIKE', '%'.$request['search'].'%')->orderBy('created_at', 'desc')->paginate(10);

        // returns view with paginated data
        return view('questions', ['question' => $question, 'search' => $request['search']]);
    }

    /*
        view(Request $request)
        Returns the view for question question_id
    */
    public function view(Request $request) {
        // get requested question data
        $question = Question::find($request['question_id']);

        // returns question page for question_id
        return view('question', ['question' => $question]);
    }
    
    /*
        myQuestions()
        Returns view of paginated questions belonging to the logged in user
    */
    public function myQuestions() {
        // get questions belonging to logged in user
        $question = Question::where('owner_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        // returns view with data
        return view('myQuestions', ['question' => $question]);
    }
    
    /*
        manageQuestions()
        Returns view of all paginated questions with admin controls
    */
    public function manageQuestions() {
        // gets all questions paginated
        $question = Question::orderBy('created_at', 'desc')->paginate(10);

        // returns view with questions
        return view('manageQuestions', ['question' => $question]);
    }

    /*
        addQuestion()
        Returns form view to add questions
    */
    public function addQuestion() {
        // gets list of available topics
        $topic = $this->getTopicOption();

        // returns form view with available topics
        return view('addQuestion', ['question' => NULL, 'topic' => $topic]);
    }

    /*
        updateQuestion()
        Returns form view to update questions
    */
    public function updateQuestion(Request $request) {
        // gets requested question data
        $question = Question::find($request['question_id']);

        // gets list of available topics
        $topic = $this->getTopicOption();

        // returns form view with question and topic data
        return view('updateQuestion', ['question' => $question, 'topic' => $topic]);
    }

    /*
        DBadd(Request $request)
        Validates and adds $request to 'questions'
        Redirects to 'questions/'
    */
    public function DBadd(Request $request) {
        // sets current login session as owner
        $request['owner_id'] = Auth::user()->id;

        // validate data
        $validatedData = $request->validate([ 'owner_id' => 'required', 'topic' => 'required', 'question' => 'required', ]);

        // add question to 'questions'
        $id = Question::create([ 'owner_id' => $request['owner_id'], 'status' => 'open', 'topic' => $request['topic'], 'question' => $request['question'], ])->id;

        // return questions view
        return redirect('questions/' . $id)->with('success', 'Question successfully added');
    }

    /*
        DBupdate(Request $request)
        Validates and updates $request on 'questions'
        Redirects to 'questions/question_id'
    */
    public function DBupdate(Request $request) {
        // validate data
        $validatedData = $request->validate([ 'topic' => 'required', 'question' => 'required', ]);

        // get the requested question entry
        $row = Question::find($request['question_id']);

        // updates entry if found
        if ($row != NULL) {
            $row->topic = $request['topic'];
            $row->question = $request['question'];
            $row->save();
        }

        // return question_id view
        return redirect('questions/' . $request['question_id'])->with('success', 'Question successfully updated');
    }

    /*
        DBclose(Request $request)
        Validates and updates $request on 'questions' to 'closed'
        Redirects to 'questions/question_id'
    */
    public function DBclose(Request $request) {
        // get requested question entry
        $row = Question::find($request['question_id']);

        // close entry if found
        if ($row != NULL) {
            $row->status = 'closed';
            $row->save();
        }

        // redirect back with success
        return back()->with('success', 'Question successfully closed');
    }

    /*
        DBdelete(Request $request)
        Validates and deletes $request on 'questions'
        redirects to 'questions/'
    */
    public function DBdelete(Request $request) {
        // get requested question entry
        $row = Question::find($request['question_id']);

        // delete entry if found
        if ($row != NULL) {
            $row->delete();
        }

        // redirect back with success
        return back()->with('success', 'Question successfully deleted');
    }

    /*
        getTopicOption()
        returns a list of available topics
    */
    public function getTopicOption() {
        // get list of available topics;
        return TopicOption::get('topic');
    }
}
