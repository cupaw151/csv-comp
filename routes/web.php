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

Route::get('/', [
    'as' => 'interview.index',
	'uses' => '\App\Http\Controllers\InterviewController@index'
]);

Route::post('/', [
    'as' => 'interview.submit',
	'uses' => '\App\Http\Controllers\InterviewController@submit'
]);
