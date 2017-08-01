<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Mentor;
use App\Startup;


class PagesController extends Controller
{
     public function home(){
         $partners=Partner::all();
         $mentors=Mentor::all();
         $startups=Startup::orderByRaw("RAND()")
                            ->take(3)
                            ->get();
         return view('welcome')->with([
           'partners'=>$partners,
           'mentors'=>$mentors,
           'startups'=>$startups
           ]);
     }
}
