<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Booking;
use App\Models\User;
use App\Models\Prescription;
use App\Models\PrescriptionDocuments;


class BookingController extends Controller
{
    public function __construct(){
        $this->view_path = 'admin.bookings.';
    }

    public function index()
    {
        $bookings = Booking::all();
        return view($this->view_path.'index',compact('bookings'));
    }

    public function today_bookings(){
        $bookings = Booking::whereDate('created_at',date('Y-m-d'))->get();
        return view($this->view_path.'today_bookings',compact('bookings'));
    }

    public function today_appointments(){
        $bookings = Booking::whereDate('booking_date',date('Y-m-d'))->get();
        return view($this->view_path.'today_appointments',compact('bookings'));
    }

    public function create()
    {
        $astrologers = User::where('role','astrologer')->where('status',1)->get();
        return view($this->view_path.'create',compact('astrologers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:10|regex:/^[6789]/',
            'booking_date' => 'required|date|after:today',
            'astrologer' => 'required|numeric|exists:users,id,role,astrologer',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            try {
                $user = User::where('phone',$request->mobile)->where('email',$request->email)->first();
                if($user){
                    $booking = new Booking();
                    $booking->booking_date = $request->booking_date;
                    $booking->user_id = $user->id;
                    $booking->astrologer_id = $request->astrologer;
                    $res = $booking->save();
                    if($res){
                        return back()->with('success','Booking Created Successfully');
                    }else{
                        return back()->with('success','Booking Not Created');
                    }
                }else{
                    if(User::where('phone',$request->mobile)->exists() && !User::where('email',$request->email)->exists()){
                        return back()->with('error','This Mobile Number Already Exists');
                    }
                    if(!User::where('phone',$request->mobile)->exists() && User::where('email',$request->email)->exists()){
                        return back()->with('error','This Email Already Exists');
                    }

                    $newuser = new User();
                    $newuser->name = $request->name;
                    $newuser->role = 'user';
                    $newuser->status = 1; 
                    $newuser->phone = $request->mobile;
                    $newuser->email = $request->email;
                    $newuser->address = $request->address;
                    $result = $newuser->save();

                    $booking = new Booking();
                    $booking->booking_date = $request->booking_date;
                    $booking->user_id = $newuser->id; 
                    $booking->astrologer_id = $request->astrologer;
                    $res = $booking->save();

                    if($result && $res){
                        return back()->with('success','Client Registred & Booking Created Successfully');
                    }else{
                        return back()->with('success','An error occurred');
                    }
                }
                return response()->json(['success' => true, 'message' => 'Booking created successfully']);

            } catch (\Exception $e) {
                // Handle the exception
                return back()->with('message','An error occurred: ' . $e->getMessage());
            }
        }
    }

    public function show(string $id)
    {
        $booking = Booking::find($id);
        $prescription = Prescription::with('prescriptionDocuments') // eager load documents
        ->where('prescriptions.booking_id', $booking->id)
        ->orderBy('prescriptions.created_at', 'desc')
        ->get();
        return view($this->view_path.'show',compact('booking','prescription'));
    }

    public function process_prescription(Request $request){
        $booking = Booking::find($request->booking_id);
        if($booking){
            if(isset($request->note)){
                $prescription = new Prescription();
                $prescription->booking_id = $booking->id;
                $prescription->note = $request->note;
                $prescription->save();
            }

            $media_files = $request->file('documents');
            if (!empty($media_files)) {
                foreach ($media_files as $file) {
                    $documents = new PrescriptionDocuments();
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $directory = public_path('web_directory/prescription/documents');
                    $mimeType = $file->getMimeType();
                    $file->move($directory, $filename);
                    $filePath = "web_directory/prescription/documents/" . $filename;

                    // Determine the media type
                    if (strstr($mimeType, "video/")) {
                        $documents->file_type = 'video';
                    } elseif (strstr($mimeType, "image/")) {
                        $documents->file_type = 'image';
                    } elseif ($mimeType == "application/pdf") {
                        $documents->file_type = 'pdf';
                    } else {
                        $documents->file_type = 'unknown';
                    }
                    $documents->booking_id = $booking->id;
                    if(isset($prescription)){
                        $documents->prescription_id = $prescription->id;
                    }
                    $documents->file_name = $filename;
                    $documents->file_path = $filePath;
                    $documents->save();
                }
            }
        }

        return redirect()->back()->with('success','Note Added Successfully');
    }

    public function delete_prescription_documents($id){
        $documents = PrescriptionDocuments::find($id);
        if($documents){
            $res = $documents->delete();
            if($res){
                return redirect()->back()->with('success','Document Deleted Successfully');
            }else{
                return redirect()->back()->with('error','Document Not Deleted');
            }
        }
    }

    public function delete_prescription_note($id){
        $prescription = Prescription::find($id);
        if($prescription){
            PrescriptionDocuments::where('prescription_id',$prescription->id)->delete();
            $res = $prescription->delete();
            if($res){
                return redirect()->back()->with('success','Note Deleted Successfully');
            }else{
                return redirect()->back()->with('error','Note Not Deleted');
            }
        }
    }

    public function edit(string $id)
    {
        $astrologers = User::where('role','astrologer')->where('status',1)->get();
        $booking = Booking::find($id);
        return view($this->view_path.'edit',compact('astrologers','booking'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:10|regex:/^[6789]/',
            'booking_date' => 'required|date|after:today',
            'astrologer' => 'required|numeric|exists:users,id,role,astrologer',
            'address' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            try {
                $user = User::where('phone',$request->mobile)->where('email',$request->email)->first();
                if($user){
                    $booking = Booking::find($id);
                    $booking->booking_date = $request->booking_date;
                    $booking->user_id = $user->id;
                    $booking->astrologer_id = $request->astrologer;
                    $res = $booking->update();
                    if($res){
                        return back()->with('success','Booking Updated Successfully');
                    }else{
                        return back()->with('success','Booking Not Updated');
                    }
                }else{
                    if(User::where('phone',$request->mobile)->exists() && !User::where('email',$request->email)->exists()){
                        return back()->with('error','This Mobile Number Already Exists');
                    }
                    if(!User::where('phone',$request->mobile)->exists() && User::where('email',$request->email)->exists()){
                        return back()->with('error','This Email Already Exists');
                    }

                    $newuser = new User();
                    $newuser->name = $request->name;
                    $newuser->role = 'user';
                    $newuser->status = 1; 
                    $newuser->phone = $request->mobile;
                    $newuser->email = $request->email;
                    $newuser->address = $request->address;
                    $result = $newuser->save();

                    $booking = Booking::find($id);
                    $booking->booking_date = $request->booking_date;
                    $booking->user_id = $newuser->id; 
                    $booking->astrologer_id = $request->astrologer;
                    $res = $booking->update();

                    if($result && $res){
                        return back()->with('success','Client Registred & Booking Updated Successfully');
                    }else{
                        return back()->with('success','An error occurred');
                    }
                }
                return response()->json(['success' => true, 'message' => 'Booking created successfully']);

            } catch (\Exception $e) {
                // Handle the exception
                return back()->with('message','An error occurred: ' . $e->getMessage());
            }
        }
    }

    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        if($booking){
            $res = $booking->delete();
            if($res){
                return back()->with(['success'=>'Booking Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Booking Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'Booking Not Found']);
        }
    }
}
