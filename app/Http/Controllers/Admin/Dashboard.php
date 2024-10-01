<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Booking;
use App\Models\Attendance;

class Dashboard extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        if ($user->hasRole('Astrologer')) {
            $total_bookings = Booking::where('astrologer_id',$user->id)->count();
            $today_appoinments = Booking::whereDate('booking_date',date('Y-m-d'))->where('astrologer_id',$user->id)->count();
            return view('admin.dashboard',compact('total_bookings','today_appoinments'));
        }else{
            $total_employee = User::where('role','employee')->count();
            $total_astrologer = User::where('role','astrologer')->count();
            $total_user = User::where('role','user')->count();
            $total_bookings = Booking::all()->count();
            $today_employee_present = Attendance::leftJoin('users','attendances.user_id','users.id')
                                                ->whereDate('attendances.login',date('Y-m-d'))
                                                ->where('users.role','employee')
                                                ->count();
            $today_appoinments = Booking::whereDate('booking_date',date('Y-m-d'))->count();
            return view('admin.dashboard',compact('total_employee','total_astrologer','total_user','total_bookings','today_employee_present','today_appoinments'));
        }
    }
}
