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

// Questions
Route::get('/questions/add', 'QuestionsController@addQuestion')->middleware('isUser');
Route::post('/questions/add', 'QuestionsController@DBadd')->middleware('isUser');
Route::get('/questions/update/{id}', 'QuestionsController@updateQuestion')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/update/', 'QuestionsController@DBupdate')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/close/', 'QuestionsController@DBclose')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/delete/', 'QuestionsController@DBdelete')->middleware(['QuestionExists', 'hasQuestionAccess']);

// Answers
Route::post('/answers/add/', 'AnswersController@DBadd')->middleware(['isUser', 'QuestionExists', 'QuestionIsOpen']);
Route::post('/answers/update/', 'AnswersController@DBupdate')->middleware(['QuestionExists', 'AnswerExists', 'hasAnswerAccess']);
Route::post('/answers/delete/', 'AnswersController@DBdelete')->middleware(['QuestionExists', 'AnswerExists', 'hasAnswerAccess']);

// View question
Route::get('/questions/{id}', 'QuestionsController@view');