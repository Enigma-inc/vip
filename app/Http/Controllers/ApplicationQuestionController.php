<?php

namespace App\Http\Controllers;

use App\ApplicationQuestion;
use Illuminate\Http\Request;
use App\QuestionCategory;
use App\Http\Requests\ApplicationQuestionRequest;

class ApplicationQuestionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=ApplicationQuestion::with(['category'])->get();
        return view('admin.questions.index')->with(['questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=QuestionCategory::orderBy('name')->get();
        return view('admin.questions.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationQuestionRequest $request)
    {
        ApplicationQuestion::create([
            'question'=>request('description'),
            'index'=>request('index'),
            'question_category_id'=>request('category'),
        ]);

        return redirect()->route('questions.list');
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
