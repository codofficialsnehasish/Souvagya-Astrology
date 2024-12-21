<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use App\Models\Magazine;
use Illuminate\Http\Request;

class MagazineControllers extends Controller
{
    public function __construct(){
        $this->middleware('role_or_permission:Magazine Show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Magazine Create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Magazine Edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Magazine Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $magazines = Magazine::all();
        return view('admin.magazine.index',compact('magazines'));
    }

    public function create()
    {
        return view('admin.magazine.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'magazines_pdf' => 'nullable|mimes:pdf|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $magazine = new Magazine();
        $magazine->name = $request->name;
        $magazine->slug = createSlug($request->name,Magazine::class);
        $magazine->description = $request->description;

        if ($request->hasFile('image')) {
            $magazine->addMedia($request->file('image'))->toMediaCollection('magazine-image');
        }

        if ($request->hasFile('magazines_pdf')) {
            $magazine->addMedia($request->file('magazines_pdf'))->toMediaCollection('magazine-pdf');
        }

        $magazine->is_visible = $request->is_visible;
        $res = $magazine->save();
        if($res){
            return redirect()->back()->with('success','Data Added Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Added, try again!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $magazine = Magazine::findOrFail($id);
        return view('admin.magazine.edit',compact('magazine'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'magazines_pdf' => 'nullable|mimes:pdf|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $magazine = Magazine::findOrFail($id);
        $magazine->name = $request->name;
        $magazine->slug = createSlug($request->name,Magazine::class);
        $magazine->description = $request->description;

        if ($request->hasFile('image')) {
            $magazine->clearMediaCollection('magazine-image');
            $magazine->addMedia($request->file('image'))->toMediaCollection('magazine-image');
        }

        if ($request->hasFile('magazines_pdf')) {
            $magazine->clearMediaCollection('magazine-pdf');
            $magazine->addMedia($request->file('magazines_pdf'))->toMediaCollection('magazine-pdf');
        }

        $magazine->is_visible = $request->is_visible;
        $res = $magazine->save();
        if($res){
            return redirect()->back()->with('success','Data Added Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Added, try again!');
        }
    }

    public function destroy(string $id)
    {
        $magazine = Magazine::find($id);
        if($magazine){
            $res = $magazine->delete();
            if($res){
                return back()->with('success','Deleted Successfully');
            }else{
                return back()->with('error','Not Deleted');
            }
        }else{
            return back()->with('error','Not Found');
        }
    }
}
