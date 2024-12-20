<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use App\Models\User;
use App\Models\Prescription;
use App\Models\PrescriptionDocuments;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(){
        $astrologers = User::where('role','astrologer')->where('status',1)->get();
        $services = Service::where('is_active',1)->limit(4)->get();
        return view('site.home',compact('astrologers','services'));
    }

    public function astrologer_booking(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|regex:/^[a-zA-Z\s]+$/|max:255',
            'emailid' => 'nullable|email',
            'mobile' => 'nullable|digits:10|regex:/^[6789]/',
            'booking_date' => 'required|date|after:today',
            'end_time' => 'required',
            'astrologer' => 'required|numeric|exists:users,id,role,astrologer',
            'address' => 'nullable|max:255',
            'client_id' => 'nullable|numeric|exists:users,id,role,user'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            try {
                $carbonDateTime = Carbon::parse($request->booking_date);
                $date = $carbonDateTime->toDateString();
                $start_time = $carbonDateTime->toTimeString();
                $end_time = $request->end_time;

                // check booking avaliable or not
                $overlap = Booking::where('booking_date', $date)
                ->where('astrologer_id', $request->astrologer)
                ->where(function ($query) use ($start_time, $end_time) {
                    $query->whereBetween('start_time', [$start_time, $end_time])
                          ->orWhereBetween('end_time', [$start_time, $end_time])
                          ->orWhere(function ($query) use ($start_time, $end_time) {
                              $query->where('start_time', '<', $start_time)
                                    ->where('end_time', '>', $end_time);
                          });
                })
                ->exists();

                if ($overlap) {
                    return back()->withErrors(['error' => 'This time slot is already booked.']);
                }

                if(isset($request->client_id)){
                    $user = User::find($request->client_id);
                    if($user){
                        $booking = new Booking();
                        $booking->booking_date = $date;
                        $booking->start_time = $start_time;
                        $booking->end_time = $end_time;
                        $booking->user_id = $user->id;
                        $booking->astrologer_id = $request->astrologer;
                        $res = $booking->save();
                        // return $user;die;
                        if($res){
                            return back()->with('success','Booking Created Successfully');
                        }else{
                            return back()->with('error','Booking Not Created');
                        }
                    }
                }else{
                    $user = User::where('phone',$request->mobile)->where('email',$request->email)->first();
                    
                    if($user){
    
                        $booking = new Booking();
                        $booking->booking_date = $date;
                        $booking->start_time = $start_time;
                        $booking->end_time = $end_time;
                        $booking->user_id = $user->id;
                        $booking->astrologer_id = $request->astrologer;
                        $res = $booking->save();
                        // return $user;die;
                        if($res){
                            return back()->with('success','Booking Created Successfully');
                        }else{
                            return back()->with('error','Booking Not Created');
                        }
                    }else{
                        if(User::where('phone',$request->mobile)->exists() && !User::where('email',$request->email)->exists()){
                            return back()->with('error','This Mobile Number Already Exists');
                        }
                        if(!User::where('phone',$request->mobile)->exists() && User::where('email',$request->email)->exists()){
                            return back()->with('error','This Email Already Exists');
                        }
    
                        $newuser = new User();
                        $newuser->name = $request->name;
                        $newuser->role = 'user';
                        $newuser->status = 1; 
                        $newuser->phone = $request->mobile;
                        $newuser->email = $request->emailid;
                        $newuser->address = $request->address;
                        $result = $newuser->save();
    
                        $booking = new Booking();
                        // $booking->booking_date = $request->booking_date;
                        // $booking->user_id = $newuser->id; 
                        // $booking->astrologer_id = $request->astrologer;

                        $booking->booking_date = $date;
                        $booking->start_time = $start_time;
                        $booking->end_time = $end_time;
                        $booking->user_id = $newuser->id;
                        $booking->astrologer_id = $request->astrologer;
                        $res = $booking->save();
    
                        if($result && $res){
                            // $user = User::where('email', Session::get('email'))->first();
                            $user = User::find($newuser->id);
                            if($user){
                                Auth::login($user);
                                return redirect()->route('user-dashboard')->with('success','Registred & Booking Created Successfully');
                            }

                            return back()->with('success','Registred & Booking Created Successfully');
                        }else{
                            return back()->with('error','An error occurred');
                        }
                    }
                    return response()->json(['success' => true, 'message' => 'Booking created successfully']);
                }

            } catch (\Exception $e) {
                // Handle the exception
                return back()->with('error','An error occurred: ' . $e->getMessage());
            }
        }
    }
}
