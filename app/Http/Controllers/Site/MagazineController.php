<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Magazine;

class MagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::where('is_visible',1)->get();
        return view('site.magazine',compact('magazines'));
    }
}