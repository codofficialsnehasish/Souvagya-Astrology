<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Booking;
use App\Models\Attendance;

class Dashboard extends Controller
{
    public function dashboard(){
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
