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
Route::prefix('portal')->group(function(){
    
});
Route::prefix('admin')->group(function () {

    //Application Routes
    Route::get('application-sessions','ApplicationSessionController@index')->name('application.sessions.list');
    Route::get('application-sessions/create','ApplicationSessionController@create')->name('application.sessions.create');
    Route::post('application-sessions','ApplicationSessionController@store')->name('application.sessions.store');

    //Application Questions Categories
    Route::get('question-categories','QuestionCategoryController@index')->name('questions.categories.list');
    Route::get('question-categories/create','QuestionCategoryController@create')->name('questions.categories.create');
    Route::post('question-categories','QuestionCategoryController@store')->name('questions.categories.store');

    //Application Questions

    Route::get('questions','ApplicationQuestionController@index')->name('questions.list');    
    Route::get('questions/create','ApplicationQuestionController@create')->name('questions.create');    

        //Mentors routes
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

        //Startups routes
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
    
        //Slideshows routes
    Route::get('slideshows',[
        'uses' => 'SlideshowController@index',
        'as' => 'slideshow.list'
    ]);
    Route::get('slideshows/create',[
        'uses' => 'SlideshowController@create',
        'as' => 'slideshow.create'
    ]);
    Route::post('slideshows',[
        'uses' => 'SlideshowController@store',
        'as' => 'slideshow.store'
    ]);
    Route::get('slideshows/{id}/edit', [
        'uses'=>'SlideshowController@edit',
        'as'=>'slideshow.edit'
    ]);
    Route::patch('slideshows/{slideshow}/edit',[
        'uses'=>'SlideshowController@update',
        'as'=>'slideshow.update'
    ]);
    Route::post('slideshows/{id}/delete',[
        'uses' => 'SlideshowController@destroy',
        'as' => 'slideshow.delete'
    ]);

        //Partners routes
    Route::get('partners',[
        'uses' => 'PartnerController@index',
        'as' => 'partner.list'
    ]);
    Route::get('partners/create',[
        'uses' => 'PartnerController@create',
        'as' => 'partner.create'
    ]);
    Route::post('partners',[
        'uses' => 'PartnerController@store',
        'as' => 'partner.store'
    ]);
    Route::get('partners/{id}/edit',[
        'uses'=> 'PartnerController@edit',
        'as'=>'partner.edit'
    ]);
    Route::patch('partners/{partner}/edit',[
        'uses' => 'PartnerController@update',
        'as'=>'partner.update'
    ]);
    Route::post('partners/{id}/delete',[
        'uses' => 'PartnerController@destroy',
        'as' => 'partner.delete'
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
