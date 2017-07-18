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
//Route::prefix('admin')->group(function () {
    Route::get('mentors',[
        'uses'=>'MentorController@index',
        'as'=>'mentor.list'
    ]);
    Route::get('mentors/create',[
        'uses'=>'MentorController@create',
        'as'=>'mentor.create'
    ]);
    Route::post('mentors',[
        'uses'=>'MentorController@store',
        'as'=>'mentor.store'
    ]);
    Route::get('mentors/{id}/edit',[
        'uses'=>'MentorController@edit',
        'as'=>'mentor.edit'
    ]);
    Route::patch('mentors/{mentor}/edit',[
        'uses'=>'MentorController@update',
        'as'=>'mentor.update'
    ]);
    Route::get('startups',[
        'uses' => 'StartupController@index',
        'as' => 'startup.list'
    ]);
    Route::get('startups/create', [
        'uses' => 'StartupController@create',
        'as' => 'startup.create'
    ]);
    Route::post('startups', [
        'uses' => 'StartupController@store',
        'as' => 'startup.store'
    ]);
    Route::get('startups/{id}/edit',[
        'uses'=>'StartupController@edit',
        'as'=>'startup.edit'
    ]);
    Route::patch('startups/{startup}/edit',[
        'uses'=>'StartupController@update',
        'as'=>'startup.update'
    ]);
    Route::post('startups/{id}/delete',[
        'uses'=>'StartupController@destroy',
        'as'=>'startup.delete'
    ]);
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
