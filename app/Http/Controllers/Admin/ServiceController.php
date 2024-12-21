<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('role_or_permission:Service Show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Service Create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Service Edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Service Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.services.index',compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort_description' => 'nullable',
            'long_description' => 'nullable',
            'price' => 'nullable',
            'duration_hours' => 'nullable|integer|min:0',
            'duration_minutes' => 'nullable|integer|min:0|max:59',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'is_active' => 'required|in:1,0'
        ], [
            'image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $totalMinutes = ($request->duration_hours * 60) + $request->duration_minutes;

        if ($totalMinutes <= 0) {
            return redirect()->back()->with('error', 'Please provide a valid duration.');
        }

        $service = new Service();
        $service->name = $request->name;
        $service->slug = createSlug($request->name,Service::class);
        $service->sort_description = $request->sort_description;
        $service->long_description = $request->long_description;
        $service->price = $request->price;
        $service->duration = $totalMinutes;
        $service->is_active = $request->is_active;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $filename = time(). '_' .$img->getClientOriginalName();
            $directory = public_path('web-directory/services');
            $img->move($directory, $filename);
            $filePath = "web-directory/services/".$filename;
            $service->image = $filePath;
        }
        $res = $service->save();

        if($res){
            return back()->with('success','Service Added Successfully');
        }else{
            return back()->with('success','Service Not Added');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit',compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'sort_description' => 'nullable',
            'long_description' => 'nullable',
            'price' => 'nullable',
            'duration_hours' => 'nullable|integer|min:0',
            'duration_minutes' => 'nullable|integer|min:0|max:59',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'is_active' => 'required|in:1,0'
        ], [
            'image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $totalMinutes = ($request->duration_hours * 60) + $request->duration_minutes;

        if ($totalMinutes <= 0) {
            return redirect()->back()->with('error', 'Please provide a valid duration.');
        }

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->slug = createSlug($request->name,Service::class);
        $service->sort_description = $request->sort_description;
        $service->long_description = $request->long_description;
        $service->price = $request->price;
        $service->duration = $totalMinutes;
        $service->is_active = $request->is_active;

        if ($request->hasFile('image')) {
            if ($service->image) {
                $existingImagePath = public_path($service->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $img = $request->file('image');
            $filename = time(). '_' .$img->getClientOriginalName();
            $directory = public_path('web-directory/services');
            $img->move($directory, $filename);
            $filePath = "web-directory/services/".$filename;
            $service->image = $filePath;
        }
        $res = $service->update();

        if($res){
            return back()->with('success','Service Updated Successfully');
        }else{
            return back()->with('success','Service Not Updated');
        }
    }

    public function destroy(string $id)
    {
        $service = Service::find($id);
        if($service){
            if ($service->image) {
                $existingImagePath = public_path($service->image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $res = $service->delete();
            if($res){
                return back()->with(['success'=>'Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'Not Found']);
        }
    }
}
