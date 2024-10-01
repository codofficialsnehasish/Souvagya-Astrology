<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if(!User::where('email',$request->email)->exists()){
            User::create([
                'name' => '',
                'email' => $request->email,
                'role' => 'user',
                'status' => 1
            ]);
        }
        // Generate a random verification code
        $verificationCode = rand(100000, 999999);

        // Save verification code in session
        Session::put('verification_code', $verificationCode);
        Session::put('email', $request->email);

        // Send email with verification code
        // Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));
        try {
            // Attempt to send the email
            Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));
    
            // Email sent successfully
            return response()->json(['message' => 'Verification code sent successfully.'], 200);
    
        } catch (Exception $e) {
            // If any exception occurs, handle it here
            return response()->json(['message' => 'Error sending email: ' . $e->getMessage()], 500);
        }

        // return response()->json(['message' => 'Verification code sent']);
    }

    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        if ($request->code == Session::get('verification_code')) {
            // Login the user
            $user = User::where('email', Session::get('email'))->first();

            Auth::login($user);

            // Check if the authenticated user's email_verified_at is empty
            if (is_null(Auth::user()->email_verified_at)) {
                // Update the email_verified_at field with the current datetime     
                Auth::user()->update(['email_verified_at' => now(),'status'=>1]);
            }

            // Clear the session data
            Session::forget('verification_code');
            Session::forget('email');

            if(is_null(Auth::user()->phone)){
                return response()->json(['status'=>0,'massage'=>'Please fillup this details']);
            }else{
                return response()->json(['status'=>1,'massage'=>'Login Successfully']);
            }

            // return redirect()->route('user-dashboard'); // Redirect to the dashboard
        } else {
            return response()->json(['error' => 'Invalid verification code'], 400);
        }
    }

    public function process_submit_details(Request $request){
        // Auth::user()->update([
        //     'name' => $request->name,
        //     'phone' => $request->mobile,
        //     'gender' => $request->gender
        // ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->phone = $request->mobile;
        $user->gender = $request->gender;
        $user->status = 1;
        $res = $user->update();
        if($res){
            return redirect()->route('home')->with('success','Thankyou. Wellcome to Souvagya.');
        }else{
            return redirect()->route('home')->with('error','Not Updated, Try Next time.');
        }
    }

    public function user_logout(){
        Auth::logout();

        return redirect()->route('home')->with('success','Logout Successfully.');
    }

    public function process_update_profile(Request $request){
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;

        $user->permanent_address = $user->present_address = $user->address = $request->address;
        $user->permanent_pin_code = $user->present_pin_code = $user->pin_code = $request->pin_code;
        $user->permanent_country = $user->present_country = $request->country;
        $user->permanent_state = $user->present_state = $request->state;
        $user->permanent_city = $user->present_city = $request->city;

        if ($request->hasFile('user_image')) {

            // Check if the employee already has a profile image
            if ($user->profile_image) {
                // Get the full path of the existing image
                $existingImagePath = public_path($user->profile_image);
                
                // Check if the existing file exists and delete it
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }

            // Handle the new image upload
            $img = $request->file('user_image');
            $filename = time(). '_' .$img->getClientOriginalName();
            $directory = public_path('web-directory/employee-profile-image');
            $img->move($directory, $filename);
            $filePath = "web-directory/employee-profile-image/".$filename;
            $user->profile_image = $filePath;
        }


        $res = $user->update();
        if($res){
            return back()->with(['success'=>'Profile Updated Successfully']);
        }else{
            return back()->with(['error'=>'Profile Not Updated']);
        }
    }
}
