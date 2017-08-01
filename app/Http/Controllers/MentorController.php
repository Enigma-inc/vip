<?php

namespace App\Http\Controllers;
use App\Mentor;
use Illuminate\Http\Request;
use App\Http\Requests\MentorRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MentorController extends Controller
{

    protected $disk;

    function __construct()
    {
        $this->disk = Storage::disk(env('FILE_SYSTEM', 'local'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mentors = Mentor::latest()->paginate(6);
        return view('admin.mentors.index')
               ->with(['mentors'=>$mentors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.mentors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MentorRequest $request)
    {   
        $mentorImage = $request->file('mentor-image');
        $mentorImageName = str_slug($request->input('name')).'.'.$mentorImage->getClientOriginalExtension();
        $mentorImagePath = "mentor-images/".$mentorImageName; 
    
        Mentor::create([
            'name'=>$request->input('name'),
            'website_link'=>$request->input('web-link'),
            'linkedin' =>$request->input('linkedIn'), 
            'image_path' =>$mentorImagePath,
            'bio' => $request->input('bio') 
        ]);
         
         $resizedmentorImage = $this->resizementorImage($mentorImage, $mentorImagePath);
         return redirect()->route('mentor.list');
    }

    public function resizementorImage(UploadedFile $mentorImage, $mentorImagePath){
        $imageStream = Image::make($mentorImage)
                    ->fit(370, 300)
                    ->stream()
                    ->detach();
        $this->disk->put($mentorImagePath, $imageStream, 'public');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $mentor=Mentor::find($id);
        if(!empty($mentor->toArray()))
        {
            return view('admin.mentors.edit')->with(['mentor'=>$mentor]);
        }
        else{
            return redirect()->route('mentor.list');
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(MentorRequest $request,Mentor $mentor)
    {
       
        $mentor->name=$request->input('name');
        $mentor->website_link=$request->input('web-link');
        $mentor->bio = $request->input('bio');
        if($request->hasFile('mentor-image')){
        $mentorImage = $request->file('mentor-image');
        $mentorImageName = str_slug($request->input('name')).'.'.$mentorImage->getClientOriginalExtension();
       
        $mentorImagePath = "mentor-images/".$mentorImageName; 
         
        $resizedMentorImage = $this->resizementorImage($mentorImage, $mentorImagePath);
        $mentor ->image_path = $mentorImagePath;
        }
        $mentor->save();
        
        return redirect()->route('mentor.list');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deletedMentor = Mentor::find($id)
                                  ->delete();
         return redirect()->route('mentor.list');
    }
}
