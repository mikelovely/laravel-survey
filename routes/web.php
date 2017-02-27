<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admins', 'middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::resource('surveys.groups.questions.answers', 'Admins\AnswerController');
    Route::resource('surveys.groups.questions', 'Admins\QuestionController');
    Route::resource('surveys.groups', 'Admins\GroupController');
    Route::resource('surveys', 'Admins\SurveyController');
});
