<?php

namespace App\Http\Controllers;

use App\ApplicationSession;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationSessionRequest;
use App\ApplicationQuestion;

class ApplicationSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions=ApplicationSession::withCount('questions')->get();
        return view('admin.application-cohorts.index')->with(['applicationSessions'=>$sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application-cohorts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationSessionRequest $request)
    {
         
        ApplicationSession::create([
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'opening_date'=>request('opening-date'),
            'closing_date'=>request('closing-date')
        ]);

        return redirect()->route('application.sessions.list');
    }
    public function getSessionQuestions(ApplicationSession $session)
    {
         
        return $session->questions()->get();
    }
    public function sessionQuestionView(ApplicationSession $session,ApplicationQuestion $question)
    {
         
         return view('admin.application-cohorts.session-questions');
    }
    public function addQuestion(ApplicationSession $session,ApplicationQuestion $question)
    {
         
        $session->questions()->toggle($question);
       // return redirect()->route('application.sessions.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplicationSession  $applicationSession
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationSession $applicationSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationSession  $applicationSession
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationSession $applicationSession)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationSession  $applicationSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationSession $applicationSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationSession  $applicationSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationSession $applicationSession)
    {
        //
    }
}
