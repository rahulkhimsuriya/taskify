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

Route::post('/login', 'Api\AuthController@login');
Route::post('/register', 'Api\AuthController@register');

Route::middleware('auth:api')->group(function () {
    Route::delete('/logout', 'Api\AuthController@logout');

    Route::apiResource('projects', 'Api\ProjectsController');

    Route::post('projects/{project}/tasks', 'Api\ProjectTasksController@store')
    ->middleware('can:update,project');

    Route::patch('projects/{project}/tasks/{task}', 'Api\ProjectTasksController@update')
    ->middleware('can:update,project');
    
    Route::delete('projects/{project}/tasks/{task}', 'Api\ProjectTasksController@destroy')
    ->middleware('can:update,project');
});
