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
Route::get('/questions/add', 'QuestionsController@addQuestion');
Route::get('/questions/update/{question_id}', 'QuestionsController@updateQuestion');
Route::post('/questions/DBadd', 'QuestionsController@DBadd');
Route::post('/questions/DBupdate', 'QuestionsController@DBupdate');
Route::get('/questions/{question_id}', 'QuestionsController@view');
