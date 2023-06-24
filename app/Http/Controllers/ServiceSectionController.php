<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
{
    public function index()
    {

        $services = ServiceSection::all();

        return view('backend.service.index',compact('services'));
    }
    public function create()
    {
        return view('backend.service.create');
    }
    public function store(Request $request)
    {
        $request->validate([

            'name'         => 'required',
            'icon_tag'     => 'required',
            'description'  => 'required',
        ]);

        $services = new ServiceSection();

        $services->name          = $request->name;
        $services->icon_tag      = $request->icon_tag;
        $services->description   = $request->description;

        $services->save();

        $notification = array(
            'message'       =>' Store Successfully ',
            'alert-type'    =>'success'
        );

        return redirect()->route('admin.service.index')->with($notification);

    }

    public function edit($id)
    {
        $services = ServiceSection::findOrFail($id);

        return view('backend.service.create',compact('services'));
    }

    public function update( Request $request, $id)
    {
        $services = ServiceSection::findOrFail($id);

        $request->validate([

            'name'         => 'required',
            'icon_tag'     => 'required',
            'description'  => 'required',
        ]);

        $services->name          = $request->name;
        $services->icon_tag      = $request->icon_tag;
        $services->description   = $request->description;

        $services->save();

        $notification = array(
            'message'       =>' Update Successfully ',
            'alert-type'    =>'success'
        );

        return redirect()->route('admin.service.index')->with($notification);


    }


}
