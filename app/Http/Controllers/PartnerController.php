<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PartnerController extends Controller
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
        $partners = Partner::all();
        return view('admin.partners.index')
               ->with(['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        $logo = $request->file('logo');
        $logoName = str_slug($request->input('name')).'.'.$logo->getClientOriginalExtension();
        $logoPath = "partner-images/".$logoName; 

       Partner::create([
            'name'=>$request->input('name'),
            'web_link'=>$request->input('web_link'),
            'logo_path' =>$logoPath
        ]);

        $resizedLogo = $this->resizeLogo($logo, $logoPath);
        //dd($resizedLogo);
        return redirect()->route('partner.list');
    }

        //Resize the logo
    public function resizeLogo(UploadedFile $logo, $logoPath)
    {
        $logoStream = Image::make($logo)
                    ->fit(260, 160)
                    ->stream()
                    ->detach();
        $this->disk->put($logoPath, $logoStream, 'public');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        if(!empty($partner->toArray()))
        {
            return view('admin.partners.edit')->with(['partner'=>$partner]);
        }
        else{
            return redirect()->route('partner.list');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->name=$request->input('name');
        $partner->web_link=$request->input('web_link');
        $logo = $request->file('logo');
        $logoName = str_slug($request->input('name')).'.'.$logo->getClientOriginalExtension();
       
        $logoPath = "partner-images/".$logoName; 
         
        $resizedLogo = $this->resizeLogo($logo, $logoPath);
        $partner ->logo_path = $logoPath;
        $partner->save();
        
        return redirect()->route('partner.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deletedPartner = Partner::find($id)
                                  ->delete();
         return redirect()->route('partner.list');
    }
}
