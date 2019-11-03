<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function addQuestion() {
        // do some DB insert stuff
        // only for logged in users (any member or admin)
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
}
