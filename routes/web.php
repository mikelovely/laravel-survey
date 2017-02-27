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

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::resource('surveys.groups.questions.answers', 'Admin\AnswerController', [
        'names' => [
            'show' => 'admin.surveys.groups.questions.answers.show',
            'destroy' => 'admin.surveys.groups.questions.answers.destroy',
        ],
    ]);
    Route::resource('surveys.groups.questions', 'Admin\QuestionController', [
        'names' => [
            'show' => 'admin.surveys.groups.questions.show',
            'destroy' => 'admin.surveys.groups.questions.destroy',
        ],
        'except' => [
            'index',
        ],
    ]);
    Route::resource('surveys.groups', 'Admin\GroupController', [
        'names' => [
            'show' => 'admin.surveys.groups.show',
            'destroy' => 'admin.surveys.groups.destroy',
        ],
        'except' => [
            'index',
        ],
    ]);
    Route::resource('surveys', 'Admin\SurveyController', [
        'names' => [
            'show' => 'admin.surveys.show',
            'destroy' => 'admin.surveys.destroy',
        ],
    ]);
});

Route::group(['middleware' => ['web', 'auth', 'role:manager']], function () {
    Route::resource('surveys.groups.questions.answers', 'Manager\AnswerController');
    Route::resource('surveys.groups.questions', 'Manager\QuestionController', ['except' => ['index']]);
    Route::resource('surveys.groups', 'Manager\GroupController', ['except' => ['index']]);
    Route::resource('surveys', 'Manager\SurveyController');
});

