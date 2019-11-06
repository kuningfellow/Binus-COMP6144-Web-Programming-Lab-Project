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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'QuestionsController@index');
Route::get('/home', 'QuestionsController@index');

Route::get('/search', 'QuestionsController@search');

// Questions
Route::get('/questions', 'QuestionsController@manageQuestions')->middleware(['isAdmin']);
Route::get('/myQuestions', 'QuestionsController@myQuestions')->middleware(['isUser']);
Route::get('/questions/add', 'QuestionsController@addQuestion')->middleware(['isUser']);
Route::post('/questions/add', 'QuestionsController@DBadd')->middleware(['isUser']);
Route::get('/questions/update/', 'QuestionsController@updateQuestion')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/update/', 'QuestionsController@DBupdate')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/close/', 'QuestionsController@DBclose')->middleware(['QuestionExists', 'QuestionIsOpen', 'hasQuestionAccess']);
Route::post('/questions/delete/', 'QuestionsController@DBdelete')->middleware(['QuestionExists', 'hasQuestionAccess']);
// View Question
Route::get('/questions/{question_id}', 'QuestionsController@view'); //->middleware(['QuestionExists']);

// Answers
Route::post('/answers/add/', 'AnswersController@DBadd')->middleware(['isUser', 'QuestionExists', 'QuestionIsOpen']);
Route::get('/answers/update/', 'AnswersController@update')->middleware(['QuestionExists', 'QuestionIsOpen', 'AnswerExists', 'hasAnswerAccess']);
Route::post('/answers/update/', 'AnswersController@DBupdate')->middleware(['QuestionExists', 'QuestionIsOpen', 'AnswerExists', 'hasAnswerAccess']);
Route::post('/answers/delete/', 'AnswersController@DBdelete')->middleware(['QuestionExists', 'QuestionIsOpen', 'AnswerExists', 'hasAnswerAccess']);

// User Profile Section
Route::get('/users', 'UsersController@index')->middleware(['isAdmin']);
Route::get('/users/add', 'UsersController@addUser')->middleware(['isAdmin']);
Route::get('/users/addADMIN', 'UsersController@addUserADMIN')->middleware(['isAdmin']);
Route::get('/users/update/', 'UsersController@updateUser')->middleware(['UserExists', 'hasUserAccess']);
Route::get('/users/updateADMIN/', 'UsersController@updateUserADMIN')->middleware(['isAdmin', 'UserExists']);
Route::post('/users/add', 'UsersController@DBadd')->middleware(['isAdmin']);
Route::post('/users/update/', 'UsersController@DBupdate')->middleware(['UserExists', 'hasUserAccess']);
Route::post('/users/delete/', 'UsersController@DBdelete')->middleware(['UserExists', 'hasUserAccess']);
// View Profile
Route::get('/users/{user_id}', 'UsersController@view'); //->middleware(['UserExists']);

// Topic Options Section
Route::get('/topics', 'TopicOptionsController@index')->middleware(['isAdmin']);
Route::get('/topics/add', 'TopicOptionsController@addTopic')->middleware(['isAdmin']);
Route::get('/topics/update/', 'TopicOptionsController@updateTopic')->middleware(['isAdmin', 'TopicOptionExists']);
Route::post('/topics/add', 'TopicOptionsController@DBadd')->middleware(['isAdmin']);
Route::post('/topics/update/', 'TopicOptionsController@DBupdate')->middleware(['isAdmin', 'TopicOptionExists']);
Route::post('/topics/delete/', 'TopicOptionsController@DBdelete')->middleware(['isAdmin', 'TopicOptionExists']);

// Message Section
Route::get('/messages', 'MessagesController@index')->middleware(['isUser']);
Route::post('/messages/add', 'MessagesController@DBadd')->middleware(['isUser', 'UserExists', 'notSameUser']);
Route::post('/messages/delete', 'MessagesController@DBdelete')->middleware(['MessageExists', 'hasMessageAccess']);
