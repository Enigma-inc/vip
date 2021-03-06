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

Route::get('/', 'PagesController@home')->name('pages.home');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/mentors', 'PagesController@mentors')->name('pages.mentors');
Route::get('/startups', 'PagesController@startups')->name('pages.startups');
Route::get('/heads-up','PagesController@headsUp')->name('pages.heads-up');
Route::get('/heads-up/{slug}','PagesController@headsUpSingle')->name('pages.heads-up-single');
// Route::get('session/{session}/apply','ApplicationController@create')->name('application.apply');
// Route::get('session/{session}/submit','ApplicationDocumentController@create')->name('application.apply.create');
// Route::post('session/{session}/submit','ApplicationDocumentController@store')->name('application.apply.store');



Route::prefix('api')->group(function () {
//  Route::get('startups','StartupController@getStartups');
 Route::get('slideshows','SlideshowController@slideshowsJson');

});


    Route::prefix('admin')->group(function () {
    // Admin Pages
    Route::get('/', 'PagesController@admin')->name('pages.admin')->middleware('auth');

    //Application Routes
    Route::get('application-sessions','ApplicationSessionController@index')->name('application.sessions.list');
    Route::get('application-sessions/create','ApplicationSessionController@create')->name('application.sessions.create');
    Route::post('application-sessions','ApplicationSessionController@store')->name('application.sessions.store');
    Route::get('application-sessions/{session}/questions','ApplicationSessionController@sessionQuestionView')->name('application.sessions.question.list');
    Route::get('api/application-sessions/{session}/add-question/{question}','ApplicationSessionController@addQuestion')->name('application.sessions.add-question');
    Route::get('api/application-sessions/{session}/questions','ApplicationSessionController@getSessionQuestions');

    Route::get('application-sessions/{id}/edit','ApplicationSessionController@edit')->name('application.sessions.edit');
    Route::patch('application-sessions/{applicationSession}/edit','ApplicationSessionController@update')->name('application.sessions.update');
    Route::post('application-sessions/{id}/deactivate','ApplicationSessionController@deactivate')->name('application.sessions.deactivate');
    Route::post('application-sessions/{id}/activate','ApplicationSessionController@activate')->name('application.sessions.activate');
    //Application Questions Categories
    Route::get('question-categories','QuestionCategoryController@index')->name('questions.categories.list');
    Route::get('api/question-categories','QuestionCategoryController@categoryListApi')->name('questions.categories.listApi');
    Route::get('question-categories/create','QuestionCategoryController@create')->name('questions.categories.create');
    Route::post('question-categories','QuestionCategoryController@store')->name('questions.categories.store');

    //Application Questions
    Route::get('questions','ApplicationQuestionController@index')->name('questions.list');
    Route::get('api/questions','ApplicationQuestionController@getQuestions');
    Route::get('questions/create','ApplicationQuestionController@create')->name('questions.create');
    Route::post('questions','ApplicationQuestionController@store')->name('questions.store');

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
    Route::post('mentors/{id}/delete',[
        'uses'=>'MentorController@destroy',
        'as'=>'mentor.delete'
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

        //Heads-Up routes
    Route::get('heads-up',[
        'uses' => 'HeadsUpController@index',
        'as' => 'heads-up.list'
    ]);
    Route::get('heads-up/create',[
        'uses' => 'HeadsUpController@create',
        'as' => 'heads-up.create'
    ]);
    Route::post('heads-up',[
        'uses' => 'HeadsUpController@store',
        'as' => 'heads-up.store'
    ]);
    Route::get('heads-up/{id}/edit',[
        'uses'=> 'HeadsUpController@edit',
        'as'=>'heads-up.edit'
    ]);
    Route::patch('heads-up/{id}/edit',[
        'uses' => 'HeadsUpController@update',
        'as'=>'heads-up.update'
    ]);
    Route::post('heads-up/{id}/delete',[
        'uses' => 'HeadsUpController@destroy',
        'as' => 'heads-up.delete'
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
