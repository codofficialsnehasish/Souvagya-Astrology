<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function __construct(){
        $this->middleware('role_or_permission:Enquiry Show', ['only' => ['index','todays_enquiry']]);
        $this->middleware('role_or_permission:Enquiry Edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Enquiry Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $enquirys = Enquiry::all();
        return view('admin.enquiry.index',compact('enquirys'));
    }

    public function todays_enquiry()
    {
        $enquirys = Enquiry::whereDate('created_at',date('Y-m-d'))->get();
        return view('admin.enquiry.index',compact('enquirys'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
    }

    public function show(Enquiry $enquiry)
    {
        //
    }

    public function edit(Enquiry $enquiry)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->admin_reply = $request->admin_reply;
        $enquiry->status = 'answered';
        $res = $enquiry->update();
        if($res){
            return back()->with('success','Send Successfully Successfully');
        }else{
            return back()->with('success','Not Updated');
        }
    }

    public function destroy(string $id)
    {
        $enquirys = Enquiry::find($id);
        if($enquirys){
            $res = $enquirys->delete();
            if($res){
                return back()->with(['success'=>'Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'Not Found']);
        }
    }
}
