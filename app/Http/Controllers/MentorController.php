<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MentorRequest;
use App\Mentor;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mentors = Mentor::all();
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
        Mentor::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'position' =>$request->input('position')
        ]);
         return redirect()->route('mentor.list');
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
        $mentor->position=$request->input('position');
        $mentor->email=$request->input('email');
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
        //
    }
}
