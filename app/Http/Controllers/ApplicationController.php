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
        $userId=Auth::User()->id;
       if($session->answers()->count()==0)
       {
           $this->initailizeApplication($session->id);
       }
       $categories=QuestionCategory::all();
       $answers=DB::table('application_answers')
                    ->select('application_answers.id as answerId','application_answers.answer',
                    'application_questions.id as questionId','application_questions.question',
                    'application_questions.question_category_id as categoryId','question_categories.name as categoryName')
                    ->join('application_questions','application_answers.question_id','application_questions.id')
                    ->join('question_categories','question_categories.id','application_questions.question_category_id')                    
                    ->join('application_sessions','application_sessions.id','application_answers.application_session_id')
                    ->where('application_answers.application_session_id','=',$session->id)
                    ->where('application_answers.user_id','=',$userId)
                    ->get();



     $modifiedCategories=array();
     foreach ($categories as  $category) {
         $ans=array();
         foreach ($answers as  $answer) {
              if($answer->categoryId==$category->id){
                          array_push($ans,[
                                "answerId" => $answer->answerId,
                                "answerText" => $answer->answer,
                                "questionId" => $answer->questionId,
                                "question" => $answer->question,
                                "categoryId" => $answer->categoryId,
                                "categoryName" => $answer->categoryName
                          ]);
                            
                        }
         }
       array_push($modifiedCategories,[
            "id"=> $category->id,
            "name"=> $category->name,
            "index"=> $category->index,
             "answers"=>$ans
       ]);
     }
     
      return view('applications.apply')->with(['categories'=>$modifiedCategories]);
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
        dd($categories);
        foreach ($categories as $category) {
            foreach ($category['answers'] as $answer) {
                $ans=ApplicationAnswer::where('question_id','=',$answer['questionId'])
                                        ->where('application_session_id','=',$sessionId)
                                        ->where('user_id','=',Auth::User()->id)
                                        ->first();
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
