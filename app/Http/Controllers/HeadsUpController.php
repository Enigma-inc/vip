<?php

namespace App\Http\Controllers;

use App\HeadsUp;
use Illuminate\Http\Request;
use App\Http\Requests\HeadsUpRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HeadsUpController extends Controller
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
     * @return Response
     */
    public function index()
    {
        $headsUp = HeadsUp::latest()->paginate(6);

        return view('admin.heads-up.index')
               ->with(['headsUp'=>$headsUp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.heads-up.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(HeadsUpRequest $request)
    {
        $headsUpImage = $request->file('image');
        $headsUpImageName = str_slug($request->input('title')).'.'.$headsUpImage->getClientOriginalExtension();
        $headsUpImagePath = "heads-up-images/".$headsUpImageName;
        $resizedHeadsUpImage = $this->resizeHeadsUpImage($headsUpImage, $headsUpImagePath);

        HeadsUp::create([
            'title'=>$request->input('title'),
            'url'=>$request->input('url'),
            'image_path' =>$headsUpImagePath,
            'body' =>$request->input('body'),
        ]);

         return redirect()->route('heads-up.list');
    }

    public function resizeHeadsUpImage(UploadedFile $headsUpImage, $headsUpImagePath){
        $headsUpImageStream = Image::make($headsUpImage)
                    ->fit(400, 300)
                    ->stream()
                    ->detach();

        $this->disk->put($headsUpImagePath, $headsUpImageStream, 'public');
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
        $headsUp = HeadsUp::find($id);
        if(!empty($headsUp->toArray()))
        {
            return view('admin.heads-up.edit')->with('headsUp', $headsUp);
        }
        else{
            return redirect()->route('heads-up.list');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(HeadsUpRequest $request, HeadsUp $headsUp)
    {

        $headsUp->title = $request->input('title');
        $headsUp->url = $request->input('url');
        // $headsUp->body = $request->input('body');
        if($request->hasFile('image'))
        {
            $headsUpImage = $request->file('image');
            $headsUpImageName = str_slug($request->input('title')).'.'.$headsUpImage->getClientOriginalExtension();

            $headsUpImagePath = "heads-up-images/".$headsUpImage;

            $resizedHeadsUpImage = $this->resizeHeadsUpImage($headsUpImage, $headsUpImagePath);

            $headsUp ->image_path = $headsUpImagePath;
        }
        $headsUp->save();

        return redirect()->route('heads-up.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deletedHeadsUp = HeadsUp::find($id)
                                  ->delete();
         return redirect()->route('heads-up.list');
    }
}
