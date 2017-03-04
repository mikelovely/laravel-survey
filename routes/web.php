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

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'role:manager']], function () {
    Route::resource('surveys.groups.questions.answers', 'Admin\AnswerController', [
        'names' => [
            'index' => 'admin.surveys.groups.questions.answers.index',
            'store' => 'admin.surveys.groups.questions.answers.store',
            'destroy' => 'admin.surveys.groups.questions.answers.destroy',
        ],
        'except' => [
            'show',
            'edit',
            'update',
            'create',
        ],
    ]);
    Route::resource('surveys.groups.questions.sub-questions', 'Admin\SubQuestionController', [
        'names' => [
            'index' => 'admin.surveys.groups.questions.sub-questions.index',
            'store' => 'admin.surveys.groups.questions.sub-questions.store',
            'destroy' => 'admin.surveys.groups.questions.sub-questions.destroy',
        ],
        'except' => [
            'show',
            'edit',
            'update',
            'create',
        ],
    ]);
    Route::resource('surveys.groups.questions', 'Admin\QuestionController', [
        'names' => [
            'index' => 'admin.surveys.groups.questions.index',
            'show' => 'admin.surveys.groups.questions.show',
            'edit' => 'admin.surveys.groups.questions.edit',
            'update' => 'admin.surveys.groups.questions.update',
            'create' => 'admin.surveys.groups.questions.create',
            'store' => 'admin.surveys.groups.questions.store',
            'destroy' => 'admin.surveys.groups.questions.destroy',
        ],
    ]);
    Route::resource('surveys.groups', 'Admin\GroupController', [
        'names' => [
            'index' => 'admin.surveys.groups.index',
            'show' => 'admin.surveys.groups.show',
            'edit' => 'admin.surveys.groups.edit',
            'update' => 'admin.surveys.groups.update',
            'create' => 'admin.surveys.groups.create',
            'store' => 'admin.surveys.groups.store',
            'destroy' => 'admin.surveys.groups.destroy',
        ],
    ]);
    Route::resource('surveys', 'Admin\SurveyController', [
        'names' => [
            'index' => 'admin.surveys.index',
            'show' => 'admin.surveys.show',
            'edit' => 'admin.surveys.edit',
            'update' => 'admin.surveys.update',
            'create' => 'admin.surveys.create',
            'store' => 'admin.surveys.store',
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

