<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questions', 'QuestionsController@index');

// Add question
Route::get('/questions/add', 'QuestionsController@addQuestion')->middleware('isMember');
Route::post('/questions/add', 'QuestionsController@DBadd')->middleware('isMember');

// Update question
Route::get('/questions/update/{question_id}', 'QuestionsController@updateQuestion')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/update/{question_id}', 'QuestionsController@DBupdate')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);

// NOTE: maybe change to post
// Close question
Route::get('/questions/close/{question_id}', 'QuestionsController@DBclose')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);

// Delete question
Route::get('/questions/delete/{question_id}', 'QuestionsController@DBdelete')->middleware(['QuestionExists', 'hasQuestionAccess']);

// View question
Route::get('/questions/{question_id}', 'QuestionsController@view');



