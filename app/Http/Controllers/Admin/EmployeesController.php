<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User; 
use Spatie\Permission\Models\Role;

class EmployeesController extends Controller
{
    public function __construct(){
        $this->view_path = 'admin.employees.';

        $this->middleware('role_or_permission:Employee Show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Employee Create', ['only' => ['add_new','process']]);
        $this->middleware('role_or_permission:Employee Edit', ['only' => ['edit','update_process']]);
        $this->middleware('role_or_permission:Employee Delete', ['only' => ['delete']]);
    }

    public function index(){
        $employees = User::where('role','employee')->orderBy('id','desc')->get();
        return view($this->view_path.'contents',compact('employees'));
    }

    public function add_new(){
        $roles = Role::all();
        return view($this->view_path.'add',compact('roles'));
    }

    public function process(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|regex:/^[6789]/|unique:users,phone',
            'password' => 'required|min:8',
            'roles' => 'nullable|exists:roles,name',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'employee_image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $employee = new User();
            $employee->name = $request->name;
            $employee->role = 'employee';
            $employee->status = $request->status;
            $employee->email = $request->email;
            $employee->phone = $request->mobile;
            $employee->password = bcrypt($request->password);
            $employee->syncRoles($request->roles);

            if ($request->hasFile('employee_image')) {
                $img = $request->file('employee_image');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/employee-profile-image');
                $img->move($directory, $filename);
                $filePath = "web-directory/employee-profile-image/".$filename;
                $employee->profile_image = $filePath;
            }


            $res = $employee->save();
            if($res){
                return back()->with('success','Employee Added Successfully');
            }else{
                return back()->with('success','Employee Not Added');
            }
        }
    }

    public function edit(Request $request){
        $employee = User::find($request->id);
        $roles = Role::all();
        return view($this->view_path.'edit',compact('employee','roles'));
    }

    public function update_process(Request $request){
        $employee = User::find($request->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($employee->id),
            ],
            'mobile' => [
                'required',
                'digits:10',
                'regex:/^[6789]/',
                Rule::unique('users', 'phone')->ignore($employee->id),
            ],
            'password' => 'nullable|min:8',
            'roles' => 'nullable|exists:roles,name',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'employee_image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $employee->name = $request->name;
            $employee->status = $request->status;
            $employee->email = $request->email;
            $employee->phone = $request->mobile;
            $employee->syncRoles($request->roles);

            if ($request->hasFile('employee_image')) {

                // Check if the employee already has a profile image
                if ($employee->profile_image) {
                    // Get the full path of the existing image
                    $existingImagePath = public_path($employee->profile_image);
                    
                    // Check if the existing file exists and delete it
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }

                // Handle the new image upload
                $img = $request->file('employee_image');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/employee-profile-image');
                $img->move($directory, $filename);
                $filePath = "web-directory/employee-profile-image/".$filename;
                $employee->profile_image = $filePath;
            }


            $res = $employee->update();
            if($res){
                return back()->with(['success'=>'Employee Updated Successfully']);
            }else{
                return back()->with(['success'=>'Employee Not Updated']);
            }
        }
    }

    public function delete(Request $request){
        $employee = User::find($request->id);
        if($employee){
            if ($employee->profile_image) {
                $existingImagePath = public_path($employee->profile_image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $res = $employee->delete();
            if($res){
                return back()->with(['success'=>'Employee Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Employee Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'User Not Found']);
        }
    }
}