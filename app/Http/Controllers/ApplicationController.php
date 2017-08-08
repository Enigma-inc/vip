<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use App\ApplicationSession;
use App\ApplicationAnswer;

class ApplicationController extends Controller
{
    
    public function index()
    {
        //
    }
    public function create(ApplicationSession $session)
    {
       if($session->answers()->count()==0)
       {
           $this->initailizeApplication($session->id);
       }
      $freshSession=ApplicationSession::with('questions','questions.category','answers')->find( $session->id);
      return $freshSession;
      return view('applications.apply')->with(['answers'=>$sessionAnswers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function initailizeApplication($sessionId)
    {
        $session=ApplicationSession::with('questions')->find($sessionId);
        
        foreach ($session->questions as $question) {
            // Add Empty answers that will be filled by user
            ApplicationAnswer::create([
                'question_id'=>$question->id,
                'application_session_id'=>$sessionId
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
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
