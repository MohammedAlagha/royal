<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function edit()
    {

        return view('admin.settings');
    }

    public function update(SettingRequest $request)
    {
        if (Setting::getValue('video') != ""){
            Storage::disk('public')->delete(Setting::getValue('video'));

        }

        if ($request->hasFile('video') && $request->file('video')->isValid())
        {
            $video = $request->file('video');
            $video_path = $video->store('/','public');
            Setting::setValue('video',$video_path);
        }

        if (Setting::getValue('logo') != ""){
            Storage::disk('public')->delete(Setting::getValue('logo'));

        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid())
        {
            $logo = $request->file('logo');
            $logo_path = $logo->store('/','public');
            Setting::setValue('logo',$logo_path);
        }

        foreach ($request->except(['_token','_method','video','logo']) as $key => $value)
        {

          Setting::setValue($key,$value);

        }

        session()->flash('success','Data Edited Successfully');

        return redirect()->route('admin.home');
    }
}
