<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('role_or_permission:Settings Show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Settings Edit', ['only' => ['edit','update']]);
    }

    public function index()
    {
        $setting = Settings::findOrFail(1);
        return view('admin.settings.index',compact('setting'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $setting = Settings::findOrFail($id);
        $setting->application_name = $request->application_name;
        $setting->site_title = $request->site_title;
        $setting->site_description = $request->site_description;
        $setting->copyright = $request->copyright;
        // if ($request->hasFile('image')) {
        //     $setting->clearMediaCollection();
        //     $setting->addMedia($request->file('image'))->toMediaCollection();
        // }
        // Update logo
        if ($request->hasFile('logo')) {
            $setting->clearMediaCollection('logo'); // Clear only the 'logo' collection
            $setting->addMedia($request->file('logo'))->toMediaCollection('logo');
        }

        // Update favicon
        if ($request->hasFile('favicon')) {
            $setting->clearMediaCollection('favicon'); // Clear only the 'favicon' collection
            $setting->addMedia($request->file('favicon'))->toMediaCollection('favicon');
        }
        $setting->primary_email = $request->primary_email;
        $setting->primary_phone = $request->primary_phone;
        $setting->address = $request->address;
        $setting->google_map = $request->google_map;
        $setting->facebook_link = $request->facebook_link;
        $setting->twitter_link = $request->twitter_link;
        $setting->linked_in_link = $request->linked_in_link;
        $setting->youtube_link = $request->youtube_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->whatsapp_link = $request->whatsapp_link;
        $res = $setting->save();
        if($res){
            return back()->with('success','Updated Successfully');
        }else{
            return back()->with('error','Not Updated');
        }
    }

    public function destroy(Setting $setting)
    {
        //
    }
}
