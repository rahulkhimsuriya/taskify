<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');

    Route::get('colors', 'ColorsController@index');

    Route::middleware('auth:api')->group(function () {
        Route::delete('/logout', 'AuthController@logout');

        Route::apiResource('projects', 'ProjectsController');

        Route::post('projects/{project}/tasks', 'ProjectTasksController@store')
        ->middleware('can:update,project');

        Route::patch('projects/{project}/tasks/{task}', 'ProjectTasksController@update')
        ->middleware('can:update,project');
    
        Route::delete('projects/{project}/tasks/{task}', 'ProjectTasksController@destroy')
        ->middleware('can:update,project');

        Route::patch('/tasks/{task}/complete', 'TaskCompleteController@update');

        Route::post('/projects/{project}/invitation', 'ProjectInvitationsController@store');
    });
});
