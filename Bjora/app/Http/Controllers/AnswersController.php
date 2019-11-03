<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function addAnswer() {
        // do some DB insert
        // only for logged in users (any member or admin)
    }
    public function editAnswer() {
        // do some DB update
        // only for owner or admin
    }
    public function deleteAnswer() {
        // do some DB delte
        // only for owner or admin
    }
}
