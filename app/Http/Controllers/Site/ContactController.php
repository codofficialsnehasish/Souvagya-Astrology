<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Enquiry;
use App\Models\User;

class ContactController extends Controller
{
    public function index(){
        return view('site.contact-us');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'user_id' => 'nullable|exists:users,id',
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:10|regex:/^[6789]/',
            'subject' => 'required',
            'message' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if(empty($request->user_id) && !User::where('email',$request->email)->exists()){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'status' => 1
            ]);
        }else{
            $user = User::where('email',$request->email)->first();
        }

        $enquiry = new Enquiry();
        $enquiry->user_id = !empty($request->user_id) ? $request->user_id : $user->id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->mobile;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;

        $res = $enquiry->save();

        if($res){
            return back()->with('success','Enquiry Sended Successfully');
        }else{
            return back()->with('success','Enquiry Not Sended, Try again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
