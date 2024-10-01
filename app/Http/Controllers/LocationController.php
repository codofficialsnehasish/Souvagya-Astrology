<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\State;
use App\Models\City;

class LocationController extends Controller
{
    public function get_state_list(Request $r){
        $country = Country::find($r->country_id);
        // $states = LocationStates::where('country_id',$r->country_id)->where('is_visible',1)->get();
        echo json_encode($country->states);
    }

    public function get_city_list(Request $r){
        $states = State::find($r->state_id);
        // $cities = LocationCities::where('state_id',$r->state_id)->where('is_visible',1)->get();
        echo json_encode($states->cities);
    }
}
