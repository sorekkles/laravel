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

/*Route::group(['middleware' => 'auth,auth.admin', 'prefix' => 'projects'], function() {

})*/

Route::get('/projects', 'ProjectController@index');

Route::get('/projects/create', 'ProjectController@create');

Route::get('/projects/{project}', 'ProjectController@show');

Route::post('/projects', 'ProjectController@store');

Route::get('/projects/edit/{project}', 'ProjectController@edit');

Route::patch('/projects/{project}', 'ProjectController@update');

Route::delete('/projects/{project}', 'ProjectController@destroy');

Route::post('/project/{project}/tasks', 'ProjectTasksController@store');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
