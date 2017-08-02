<?php

namespace App\Http\Controllers;

use App\ApplicationSession;
use Illuminate\Http\Request;
use App\Http\Requests\ApplicationSessionRequest;
use App\ApplicationQuestion;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Input;

class ApplicationSessionController extends Controller
{
   protected $disk;

    function __construct()
    {
        $this->disk = Storage::disk(env('FILE_SYSTEM', 'local'));
         $this->middleware('auth');
    }
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
        $active = Input::has('active') ?true : false;
        $slideImage = $request->file('slide_image');
        $slideImageName = str_slug($request->input('slide_title')).'.'.$slideImage->getClientOriginalExtension();
        $slideImagePath = "slide-images/".$slideImageName; 
        ApplicationSession::create([
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'slide_title'=>request('slide_title'),
            'slide_text' => request('slide_text'),
            'opening_date'=>request('opening-date'),
            'closing_date'=>request('closing-date'),
            'slide_image_path'=>$slideImagePath,
            'active'=>$active
        ]);

        $resisedSlideImage  = $this -> resizeSlideImage($slideImage,$slideImagePath);
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


    public function resizeSlideImage(UploadedFile $slideImage, $slideImagePath){
        $slideImageStream = Image::make($slideImage)
                    ->fit(1400, 500)
                    ->stream()
                    ->detach();
        $this->disk->put($slideImagePath, $slideImageStream, 'public');

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
       public function edit($id){
        $applicationSession = ApplicationSession::find($id);
        if(!empty($applicationSession->toArray()))
        {
            return view('admin.application-cohorts.edit')->with(['applicationSession'=>$applicationSession]);
        }
        else{
            return redirect()->route('application.sessions.list');
        }
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
        $active = Input::has('active') ?true : false;
        $applicationSession->title=$request->input('title');
        $applicationSession->slug=str_slug(request('title'));
        $applicationSession->active = $active;
        $applicationSession->slide_title=$request->input('slide_title');
        $applicationSession->slide_text=$request->input('slide_text');
       if($request->hasFile('slide_image')){     
        $slideImage = $request->file('slide_image');
        $slideImageName = str_slug($request->input('slide_title')).'.'.$slideImage->getClientOriginalExtension();
        $slideImagePath = "slide-images/".$slideImageName; 
        $resizedSlideImage = $this->resizeSlideImage($slideImage, $slideImagePath);
        $applicationSession->slide_image_path  = $slideImagePath;
       }
        $applicationSession->save();
        
        return redirect()->route('application.sessions.list');
    }
    
    public function activate($id)
    {
        $activatedSession = ApplicationSession::find($id);
        $activatedSession->active =1;
        $activatedSession->save();

        return redirect()->route('application.sessions.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationSession  $applicationSession
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $deactivatedSession =ApplicationSession::find($id);
        $deactivatedSession->active = 0;
        $deactivatedSession->save();

        return redirect()->route('application.sessions.list');
    }
}
