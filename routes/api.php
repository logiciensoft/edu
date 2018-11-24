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

    //COURSE ROUTES
    Route::prefix('courses')
        ->group(function (){
            Route::get('/', 'CourseController@index');
            Route::post('/', 'CourseController@store');
            Route::get('{id}', 'CourseController@show');
            Route::put('{id}', 'CourseController@update');
            Route::delete('{id}', 'CourseController@destroy');
        });
});
