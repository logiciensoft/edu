<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')
    ->namespace('Api')
    ->group(function (){

        Route::get('/user', function (Request $request) { return $request->user(); });

        //COURSES ROUTES
        Route::prefix('courses')
            ->group(function (){
                Route::get('/', 'CourseController@index');
                Route::post('/', 'CourseController@store');
                Route::get('{id}', 'CourseController@show');
                Route::put('{id}', 'CourseController@update');
                Route::delete('{id}', 'CourseController@destroy');
            });

        //SUBJECTS ROUTES
        Route::prefix('subjects')
            ->group(function (){
                Route::get('/', 'SubjectController@index');
                Route::post('/', 'SubjectController@store');
                Route::get('{id}', 'SubjectController@show');
                Route::put('{id}', 'SubjectController@update');
                Route::delete('{id}', 'SubjectController@destroy');
            });

        //TUTORIALS ROUTES
        Route::prefix('tutorials')
            ->group(function (){
                Route::get('/', 'TutorialController@index');
                Route::post('/', 'TutorialController@store');
                Route::get('{id}', 'TutorialController@show');
                Route::put('{id}', 'TutorialController@update');
                Route::delete('{id}', 'TutorialController@destroy');
            });

        //QUIZZES ROUTES
        Route::prefix('quizzes')
            ->group(function (){
                Route::get('/', 'QuizController@index');
                Route::post('/', 'QuizController@store');
                Route::get('{id}', 'QuizController@show');
                Route::put('{id}', 'QuizController@update');
                Route::delete('{id}', 'QuizController@destroy');
            });
    });
