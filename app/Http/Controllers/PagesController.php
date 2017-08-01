<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Mentor;


class PagesController extends Controller
{
     public function home(){
         $partners=Partner::all();
         $mentors=Mentor::all();
         return view('welcome')->with([
           'partners'=>$partners,
           'mentors'=>$mentors]);
     }
}
