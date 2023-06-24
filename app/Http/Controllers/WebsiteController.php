<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Section;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $servicessection   = Section::where('id', 1)->first();
        $portfoliosection  = Section::where('id', 2)->first();
        $contactsection    = Section::where('id', 3)->first();

        $servicimage       = Portfolio::all();


        return view('frontend.index',compact('servicessection','portfoliosection','servicimage'));


    }
}
