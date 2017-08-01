<?php

namespace App\Http\Controllers;

use App\Startup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StartupRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StartupController extends Controller
{
    protected $disk;

    function __construct()
    {
        $this->disk = Storage::disk(env('FILE_SYSTEM', 'local'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startups = Startup::all();

        return view('admin.startups.index')
                 ->with(['startups'=>$startups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.startups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StartupRequest $request)
    {
        $logo = $request->file('logo');
        $logoName = str_slug($request->input('name')).'.'.$logo->getClientOriginalExtension();
        $logoPath = "startup-logos/".$logoName; 
       Startup::create([
            'name'=>$request->input('name'),
            'about'=>$request->input('about'),
            'web_link' =>$request->input('web_link'),
            'logo_path' =>$logoPath
        ]);

        $resizedLogo = $this->resizeLogo($logo, $logoPath);
        //dd($resizedLogo);
        return redirect()->route('startup.list');
    }

    public function resizeLogo(UploadedFile $logo, $logoPath)
    {
        $logoStream = Image::make($logo)
                    ->fit(500, 270)
                    ->stream()
                    ->detach();
        $this->disk->put($logoPath, $logoStream, 'public');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $startup = Startup::find($id);
        if(!empty($startup->toArray()))
        {
            return view('admin.startups.edit')->with(['startup'=>$startup]);
        }
        else{
            return redirect()->route('startup.list');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Startup $startup)
    {
        $startup->name=$request->input('name');
        $startup->about=$request->input('about');
        $startup->web_link=$request->input('web_link');
        if($request->hasFile('logo')){
        $logo = $request->file('logo');
        $logoName = str_slug($request->input('name')).'.'.$logo->getClientOriginalExtension();
        $logoPath = "startup-logos/".$logoName; 
        $resizedLogo = $this->resizeLogo($logo, $logoPath);
        $startup->logo_path = $logoPath;
        }
        $startup->save();
        
        return redirect()->route('startup.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedStartup = Startup::find($id)
                                  ->delete();
         return redirect()->route('startup.list');

    }
}
