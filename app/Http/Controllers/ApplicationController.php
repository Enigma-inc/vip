<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\ApplicationSession;
use App\ApplicationAnswer;
use App\QuestionCategory;
use DB;
use Auth;

class ApplicationController extends Controller
{
    
       function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }
    public function create(ApplicationSession $session)
    {
             return view('applications.apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initailizeApplication($sessionId)
    {
        $userId=Auth::User()->id;
        $session=ApplicationSession::with('questions')->find($sessionId);
        
        foreach ($session->questions as $question) {
            // Add Empty answers that will be filled by user
            ApplicationAnswer::create([
                'question_id'=>$question->id,
                'application_session_id'=>$sessionId,
                'user_id'=>$this->userId
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$sessionId)
    {
        // Save user questions
        $categories=$request->toArray();
        foreach ($categories as $category) {
            foreach ($category['answers'] as $answer) {
                $ans=ApplicationAnswer::where('question_id','=',$answer['questionId'])
                                        ->where('application_session_id','=',$sessionId)
                                        ->where('user_id','=',Auth::User()->id)
                                        ->first();
                                        dd($answer['answerText']);
                $ans->answer=$answer['answerText'];
                 $ans->save();
            }
        }
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
