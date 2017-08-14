<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicationDocument;

class AplicationDocumentController extends Controller
{
    public function index(){
        return ApplicationDocument::all();
    }

    public function create(){
        return view('applications.submit');
    }
}
