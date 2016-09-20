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

Route::group(['prefix' => 'admins', 'middleware' => ['web', 'auth']], function () {
    Route::resource('surveys', 'Admins\SurveyController');
    Route::resource('surveys.groups', 'Admins\Survey\GroupController');
    Route::resource('surveys.groups.questions', 'Admins\Survey\Group\QuestionController');
    Route::resource('surveys.groups.questions.answers', 'Admins\Survey\Group\Question\AnswerController');
    Route::get('/get-all', 'Admins\Survey\Group\Question\AnswerController@getAll');
    Route::delete('/delete', 'Admins\Survey\Group\Question\AnswerController@delete');
});
