<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Attendance;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function login_attendance()
    {
        if(!Attendance::where('user_id',Auth::id())->whereDate('login',date('Y-m-d'))->exists()){
            $attendance = new Attendance();
            $attendance->user_id = Auth::id();
            $attendance->login = now();
            $attendance->save();
        }
    }

    public function logout_attendance()
    {
        if(Attendance::where('user_id',Auth::id())->whereDate('login',date('Y-m-d'))->exists()){
            $attendance = Attendance::where('user_id',Auth::id())->whereDate('login',date('Y-m-d'))->latest()->first();
            $attendance->logout = now();
            $attendance->save();
        }
    }

    public function index(){
        $attendances = Attendance::leftJoin('users','attendances.user_id','users.id')
                                ->where('users.role','employee')
                                ->orderBy('attendances.login','desc')
                                ->get();
        return view('admin.attendance.index',compact('attendances'));
    }

    public function todays_attendance(){
        $attendances = Attendance::leftJoin('users','attendances.user_id','users.id')
                                ->whereDate('attendances.login',date('Y-m-d'))
                                ->where('users.role','employee')
                                ->orderBy('attendances.login','desc')
                                ->get();
        return view('admin.attendance.today_attendance',compact('attendances'));
    }
}
