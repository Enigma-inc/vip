<?php

namespace App\Http\Controllers;

use App\ApplicationQuestion;
use Illuminate\Http\Request;

class ApplicationQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=ApplicationQuestion::all();
        return view('admin.questions.index')->with(['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplicationQuestion  $applicationQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationQuestion $applicationQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationQuestion  $applicationQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationQuestion $applicationQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationQuestion  $applicationQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationQuestion $applicationQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationQuestion  $applicationQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationQuestion $applicationQuestion)
    {
        //
    }
}
