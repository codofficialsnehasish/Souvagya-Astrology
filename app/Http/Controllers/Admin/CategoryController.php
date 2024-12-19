<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        return view('admin.category.index',compact('categorys'));
    }

    public function create()
    {
        $categorys = Category::where('parent_id',null)->get();
        return view('admin.category.create',compact('categorys'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = $request->name;
        // $category->slug = $request->slug;
        $category->slug = createSlug($request->name,Category::class);
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $category->addMedia($request->file('image'))->toMediaCollection('category');
        }

        $category->is_visible = $request->is_visible;
        $res = $category->save();
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
        $category = Category::find($id);
        $categorys = Category::where('parent_id',null)->get();
        return view('admin.category.edit',compact('category','categorys'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id);
        $category->name = $request->name;
        // $category->slug = $request->slug;
        if($category->name != $request->name){
            $category->slug = createSlug($request->name,Category::class);
        }
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $category->clearMediaCollection('category');
            $category->addMedia($request->file('image'))->toMediaCollection('category');
        }

        $category->is_visible = $request->is_visible;
        $res = $category->update();
        if($res){
            return redirect()->back()->with('success','Data Updated Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Updated, try again!');
        }
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category){
            $res = $category->delete();
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
