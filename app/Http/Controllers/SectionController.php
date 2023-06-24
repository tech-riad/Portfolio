<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('backend.section.index',compact('sections'));
    }
    public function create()
    {
        return view('backend.section.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'section_header'          => 'required',
            'section_message'         => 'required',
        ]);

        $sections = new Section();

        $sections->section_header     = $request->section_header;
        $sections->section_message    = $request->section_message;

        $sections->save();

        $notification = array(
            'message'       =>' Store Successfully ',
            'alert-type'    =>'success'
        );

        return redirect()->route('admin.section.index')->with($notification);

    }

    public function edit($id)
    {
        $sections = Section::find($id);
        return view('backend.section.create',compact('sections'));
    }
    public function update(Request $request, $id)
    {
        $sections = Section::findOrFail($id);
        $request->validate([
            'section_header'          => 'required',
            'section_message'         => 'required',
        ]);


        $sections->section_header     = $request->section_header;
        $sections->section_message    = $request->section_message;

        $sections->save();

        $notification = array(
            'message'       =>' Store Successfully ',
            'alert-type'    =>'success'
        );

        return redirect()->route('admin.section.index')->with($notification);
    }


}
