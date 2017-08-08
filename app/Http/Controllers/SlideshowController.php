<?php

namespace App\Http\Controllers;
use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Requests\SlideshowRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class SlideshowController extends Controller
{
    protected $disk;

    function __construct()
    {
        $this->disk = Storage::disk(env('FILE_SYSTEM', 'local'));
         $this->middleware('auth');
    }

    public function index(){
        $slideshows = Slideshow::latest()->paginate(6);
        return view('admin.slideshows.index')
               ->with(['slideshows' =>$slideshows]);
    }
    public function slideshowsJson()
    {
       return Slideshow::all();
    }

    public function create(){
        return view('admin.slideshows.create');
    }

    public function store(SlideshowRequest $request)
    {
        $bgImage = $request->file('background_image');
        $bgImageName = str_slug($request->input('title')).'.'.$bgImage->getClientOriginalExtension();
        $bgImagePath = "slideshow-images/".$bgImageName; 

       Slideshow::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'button_link' =>$request->input('button_link'),
            'bgImage_path' =>$bgImagePath
        ]);

        $resizedbgImage = $this->resizebgImage($bgImage, $bgImagePath);
        //dd($resizedLogo);
        return redirect()->route('slideshow.list');
    }

    public function resizebgImage(UploadedFile $bgImage, $bgImagePath)
    {
        $bgImageStream = Image::make($bgImage)
                    ->fit(1050, 400)
                    ->stream()
                    ->detach();
        $this->disk->put($bgImagePath, $bgImageStream, 'public');
    }
    public function edit($id){
        $slideshow = Slideshow::find($id);
        if(!empty($slideshow->toArray()))
        {
            return view('admin.slideshows.edit')->with(['slideshow'=>$slideshow]);
        } 
        else{
            return redirect()->route('slideshow.list');
        }
    }

    public function update(Request $request, Slideshow $slideshow)
    {
        $slideshow->title=$request->input('title');
        $slideshow->description=$request->input('description');
        $slideshow->button_link=$request->input('button_link');

        if($request->hasFile('background_image')){
        $bgImage = $request->file('background_image');
       $bgImageName = str_slug($request->input('title')).'.'.$bgImage->getClientOriginalExtension();
        $bgImagePath = "slideshow-images/".$bgImageName; 
        $resizedbgImage = $this->resizebgImage($bgImage, $bgImagePath);
        $slideshow->bgImage_path  = $bgImagePath;
        }
        $slideshow->save();
        
        return redirect()->route('slideshow.list');
    }
    public function destroy($id)
    {
        $deletedStartup = Slideshow::find($id)
                                  ->delete();
         return redirect()->route('slideshow.list');
    }
}
