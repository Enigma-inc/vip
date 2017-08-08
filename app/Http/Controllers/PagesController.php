<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Mentor;
use App\Startup;
use App\Slideshow;


class PagesController extends Controller
{
     public function home(){
         $partners=Partner::orderByRaw("RAND()")
                              ->get();
         $mentors=Mentor::orderByRaw("RAND()")
                            ->take(2)
                            ->get();
         $startups=Startup::orderByRaw("RAND()")
                            ->take(3)
                            ->get();

         $slides=Slideshow::all();
         
         return view('pages.home')->with([
           'partners'=>$partners,
           'mentors'=>$mentors,
           'startups'=>$startups,
           'slides'=>$slides
           ]);
     }

     public function about(){
       return view('pages.about');
     }
     public function mentors(){
          $mentors=Mentor::orderByRaw("RAND()")
                            ->get();
       return view('pages.mentors',[
          'mentors'=>$mentors,
       ]);
     }
     public function startups(){
          $startups=Startup::orderByRaw("RAND()")
                            ->get();
       return view('pages.startups',[
          'startups'=>$startups,
       ]);
     }
}
