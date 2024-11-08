<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User; 
use App\Models\AstrologerCertificate;
use Illuminate\Http\Request;

class AstrologerController extends Controller
{
    public function __construct(){
        $this->view_path = 'admin.astrologer.';

        $this->middleware('role_or_permission:Astrologer Show', ['only' => ['index']]);
        $this->middleware('role_or_permission:Astrologer Create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Astrologer Edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Astrologer Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $astrologers = User::where('role','astrologer')->get();
        return view($this->view_path.'index',compact('astrologers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->view_path.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|regex:/^[6789]/|unique:users,phone',
            'aadhaar_number' => 'required|digits:12',
            'password' => 'required|min:8',
            'astrologer_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'certificate' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'astrologer_image.max' => 'The Employee Image must not be larger than 2 MB.',
            'aadhar_front.max' => 'The Employee Image must not be larger than 2 MB.',
            'aadhar_back.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $astrologer = new User();
            $astrologer->name = $request->name;
            $astrologer->role = 'astrologer';
            $astrologer->status = $request->status;
            $astrologer->email = $request->email;
            $astrologer->phone = $request->mobile;
            $astrologer->password = bcrypt($request->password);
            $astrologer->aadhaar_number = $request->aadhaar_number;

            if ($request->hasFile('astrologer_image')) {
                $img = $request->file('astrologer_image');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/profile-picture');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/profile-picture/".$filename;
                $astrologer->profile_image = $filePath;
            }

            if ($request->hasFile('aadhar_front')) {
                $img = $request->file('aadhar_front');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->aadhaar_front_side = $filePath;
            }

            if ($request->hasFile('aadhar_back')) {
                $img = $request->file('aadhar_back');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->aadhaar_back_side = $filePath;
            }

            if ($request->hasFile('pan_card')) {
                $img = $request->file('pan_card');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->pan_card_proof = $filePath;
            }

            $astrologer->syncRoles('Astrologer');
            $res = $astrologer->save();

            foreach($request->certificate_name as $key => $value){
                $astrologer_certificate = new AstrologerCertificate();
                $astrologer_certificate->astrologer_id = $astrologer->id;
                $astrologer_certificate->certificate_name = $request->certificate_name[$key];
                $astrologer_certificate->certified_date = $request->certificate_date[$key];
                if (isset($request->certificate_image[$key]) && $request->hasFile("certificate_image.$key")) {
                    $img = $request->file("certificate_image.$key");
                    $filename = time() . '_' . $img->getClientOriginalName();
                    $directory = public_path('web-directory/astrologer/documents');
                    $img->move($directory, $filename);
                    
                    $filePath = "web-directory/astrologer/documents/" . $filename;
                    $astrologer_certificate->certificate_image = $filePath;
                }
                $astrologer_certificate->save();
            }
            if($res){
                return back()->with('success','Astrologer Added Successfully');
            }else{
                return back()->with('success','Astrologer Not Added');
            }
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
        $astrologer = User::find($id);
        $certificates = AstrologerCertificate::where('astrologer_id',$astrologer->id)->get();
        return view($this->view_path.'edit',compact('astrologer','certificates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $astrologer = User::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($astrologer->id),
            ],
            'mobile' => [
                'required',
                'digits:10',
                'regex:/^[6789]/',
                Rule::unique('users', 'phone')->ignore($astrologer->id),
            ],
            'aadhaar_number' => 'required|digits:12',
            'astrologer_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_front' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aadhar_back' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'certificate' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'astrologer_image.max' => 'The Employee Image must not be larger than 2 MB.',
            'aadhar_front.max' => 'The Employee Image must not be larger than 2 MB.',
            'aadhar_back.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $astrologer->name = $request->name;
            $astrologer->status = $request->status;
            $astrologer->email = $request->email;
            $astrologer->phone = $request->mobile;
            $astrologer->aadhaar_number = $request->aadhaar_number;

            if ($request->hasFile('astrologer_image')) {
                if ($astrologer->profile_image) {
                    $existingImagePath = public_path($astrologer->profile_image);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }
                $img = $request->file('astrologer_image');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/profile-picture');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/profile-picture/".$filename;
                $astrologer->profile_image = $filePath;
            }

            if ($request->hasFile('aadhar_front')) {
                if ($astrologer->aadhaar_front_side) {
                    $existingImagePath = public_path($astrologer->aadhaar_front_side);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }
                $img = $request->file('aadhar_front');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->aadhaar_front_side = $filePath;
            }

            if ($request->hasFile('aadhar_back')) {
                if ($astrologer->aadhaar_back_side) {
                    $existingImagePath = public_path($astrologer->aadhaar_back_side);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }
                $img = $request->file('aadhar_back');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->aadhaar_back_side = $filePath;
            }

            if ($request->hasFile('pan_card')) {
                if ($astrologer->pan_card_proof) {
                    $existingImagePath = public_path($astrologer->pan_card_proof);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
                }
                $img = $request->file('pan_card');
                $filename = time(). '_' .$img->getClientOriginalName();
                $directory = public_path('web-directory/astrologer/documents');
                $img->move($directory, $filename);
                $filePath = "web-directory/astrologer/documents/".$filename;
                $astrologer->pan_card_proof = $filePath;
            }

            $astrologer->syncRoles('Astrologer');
            $res = $astrologer->update();

            foreach($request->certificate_name as $key => $value){
                $astrologer_certificate = new AstrologerCertificate();
                $astrologer_certificate->astrologer_id = $astrologer->id;
                $astrologer_certificate->certificate_name = $request->certificate_name[$key];
                $astrologer_certificate->certified_date = $request->certificate_date[$key];
                if (isset($request->certificate_image[$key]) && $request->hasFile("certificate_image.$key")) {
                    $img = $request->file("certificate_image.$key");
                    $filename = time() . '_' . $img->getClientOriginalName();
                    $directory = public_path('web-directory/astrologer/documents');
                    $img->move($directory, $filename);
                    
                    $filePath = "web-directory/astrologer/documents/" . $filename;
                    $astrologer_certificate->certificate_image = $filePath;
                }
                $astrologer_certificate->save();
            }
            if($res){
                return back()->with('success','Astrologer Updated Successfully');
            }else{
                return back()->with('success','Astrologer Not Updated');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $astrologer = User::find($id);
        if($astrologer){
            if ($astrologer->profile_image) {
                $existingImagePath = public_path($astrologer->profile_image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            if ($astrologer->aadhaar_front_side) {
                $existingImagePath = public_path($astrologer->aadhaar_front_side);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            if ($astrologer->aadhaar_back_side) {
                $existingImagePath = public_path($astrologer->aadhaar_back_side);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            if ($astrologer->pan_card_proof) {
                $existingImagePath = public_path($astrologer->pan_card_proof);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $res = $astrologer->delete();
            if($res){
                return back()->with(['success'=>'Astrologer Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Astrologer Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'Astrologer Not Found']);
        }
    }

    public function delete_certificate_image(string $id){
        $AstrologerCertificate = AstrologerCertificate::find($id);
        if($AstrologerCertificate){
            if ($AstrologerCertificate->certificate_image) {
                $existingImagePath = public_path($AstrologerCertificate->certificate_image);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            }
            $res = $AstrologerCertificate->delete();
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
