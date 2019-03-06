<?php

use Illuminate\Filesystem\Filesystem;
use App\Example;

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

/**
 * Example of how to call an instance of a class with an API
 */
app()->singleton('App\Services\Textlocal', function() {
    return new \App\Services\Textlocal(config('services.textlocal.api_key'));
});

/**
 * Add many into the service container
 */
// app()->bind('example', function() {
//     return new \App\Example;
// });

// app()->bind('App\Example', function() {
//     return new \App\Example;
// });

/**
 * Add a single instance into the service container
 */
// app()->singleton('example', function() {
//     return new \App\Example;
// });

Route::get('/', function () {
    // dd(app('App\Example'));
    // dd(app('example'), app('example'));
    return view('welcome');
});

Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');