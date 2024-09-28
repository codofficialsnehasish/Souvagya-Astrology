<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Admin\AttendanceController;

use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('admin.authentication.login');
    }

    public function process_login(Request $request){
        if ($request->isMethod('post')){
            try {
                $validator =  Validator::make($request->all(),[
                    'email'=>'required|email',
                    'password'=>'required'
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator->errors())->withInput(); 
                }


                $credentials = $request->only('email', 'password');
                $remember = $request->has('remember');

                if (Auth::attempt($credentials, $remember)) {
                    // Authentication passed
                    $attendance = new AttendanceController();
                    $attendance->login_attendance();
                    return redirect()->route('dashboard')->with('success','Login Successfully');
                }

                // Authentication failed
                return redirect()->back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }

    }

    public function profile(){
        return view('admin.profile.profile');
    }

    public function update_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'employee_image.max' => 'The Profile Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $employee = User::find(Auth::id());
            $employee->name = $request->name;
            $employee->address = $request->address;

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
                return back()->with(['success'=>'Profile Updated Successfully']);
            }else{
                return back()->with(['error'=>'Profile Not Updated']);
            }
        }
    }

    public function change_password(){
        return view('admin.authentication.reset_password');
    }

    public function process_change_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $obj = User::find(Auth::id());
                $obj->password = bcrypt($request->password);
                $res = $obj->update();
                if($res){
                    Auth::logout();
                    return redirect()->route('admin.login')->with('success','Password Changed Successfully, Please Login With Your New Password');
                }else{
                    return back()->with('error','Password Chnaged Successfully');
                }
            } else {
                return back()->with('error','Not Matched Old Password');
            }
        }
    }

    public function logout(){
        $attendance = new AttendanceController();
        $attendance->logout_attendance();
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Logout Successfully');
    }
}
