<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('backend.setting.setting',compact('setting'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name'              => 'required',
        'logo'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'slider_image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'about_image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'about_description' => 'required',
    ]);

    $settingData = [
        'name'              => $request->input('name'),
        'about_description' => $request->input('about_description'),
    ];

    if ($logo = $request->file('logo')) {
        $destinationPath = 'setting/images/';
        $logoName = date('YmdHis') . "." . $logo->getClientOriginalExtension();
        $logo->move($destinationPath, $logoName);
        $settingData['logo'] = $destinationPath . $logoName;
    }

    if ($sliderImage = $request->file('slider_image')) {
        $destinationPath = 'setting/images/';
        $sliderImageName = date('YmdHis') . "." . $sliderImage->getClientOriginalExtension();
        $sliderImage->move($destinationPath, $sliderImageName);
        $settingData['slider_image'] = $destinationPath . $sliderImageName;
    }

    if ($aboutImage = $request->file('about_image')) {
        $destinationPath = 'setting/images/';
        $aboutImageName = date('YmdHis') . "." . $aboutImage->getClientOriginalExtension();
        $aboutImage->move($destinationPath, $aboutImageName);
        $settingData['about_image'] = $destinationPath . $aboutImageName;
    }

    $setting = Setting::updateOrCreate(['id' => $id], $settingData);

    // Redirect or return a response

    return redirect()->back();
}

}
