<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Booking;
use App\Models\Prescription;
use App\Models\PrescriptionDocuments;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class UserDashboard extends Controller
{
    public function index(){
        $bookings = Booking::where('user_id',Auth::id())->get();
        foreach ($bookings as $booking) {
            $booking->prescriptions = Prescription::with('prescriptionDocuments')
                ->where('booking_id', $booking->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $countrys = Country::where('is_visible',1)->get();
        $states = State::where('country_id',Auth::user()->permanent_country)->get();
        $cities = City::where('state_id',Auth::user()->permanent_state)->get();
        return view('site.user_dashboard',compact('bookings','countrys','states','cities'));
    }
}