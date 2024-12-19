<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active',1)->get();
        return view('site.services',compact('services'));
    }

    public function service_details($slug)
    {
        if(!empty($slug)){
            $service = Service::where('slug',$slug)->first();
            return view('site.service-details',compact('service'));
        }else{
            return back()->with('error','Service Not Found');
        }
    }
}
