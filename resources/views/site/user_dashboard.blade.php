@extends('layouts.site_layout')

@section('title') Home @endsection

@section('content')


    <section>
        <div class="container-fluid">
            <div class="card mt-5">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Profile</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Bookings&nbsp;({{ count($bookings) }})</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-enquiry" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Enquiry&nbsp;({{ count($enquirys) }})</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-orders" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Orders&nbsp;({{ count($orders) }})</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                            <div class="row mt-5">
                                <div class="col-12 col-xl-4">
                                    <div class="card rounded-4">
                                        <div class="card-body p-4">
                                            <div class="position-relative mb-5">
                                                <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                                                    <img src="{{ asset(Auth::user()->profile_image) }}" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                                                </div>
                                            </div>
                                            <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <h3>{{ Auth::user()->name }}</h3>
                                                    <p class="mb-0">{{ Auth::user()->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card rounded-4 mt-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start justify-content-between mb-3">
                                                <div class="">
                                                    <h5 class="mb-0 fw-bold">About</h5>
                                                </div>
                                            </div>
                                            <div class="full-info">
                                                <div class="info-list d-flex flex-column gap-3">
                                                    <div class="info-list-item d-flex align-items-center gap-3"><p class="mb-0">Status: active</p></div>
                                                    <div class="info-list-item d-flex align-items-center gap-3"><p class="mb-0">Email: {{ Auth::user()->email }}</p></div>
                                                    <div class="info-list-item d-flex align-items-center gap-3"><p class="mb-0">Phone: {{ Auth::user()->phone }}</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8">
                                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-start justify-content-between mb-3">
                                                <div class="">
                                                    <h5 class="mb-0 fw-bold">Edit Profile</h5>
                                                </div>
                                            </div>
                                            <form class="row g-4 modal-body" action="{{ route('process-update-profile') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-md-5">
                                                    <label for="name" class="form-label">Enter Name</label>
                                                    <input type="text" name="name" placeholder="Enter name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="mobile" class="form-label">Mobile Number</label>
                                                    <input type="text" name="mobile" id="mobile" placeholder="Enter mobile number" class="form-control" value="{{ Auth::user()->phone }}" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                    <select name="gender" class="form-control" id="gender">
                                                        <option @if(Auth::user()->gender == 'Male') selected @endif value="Male">Male</option>
                                                        <option @if(Auth::user()->gender == 'Female') selected @endif value="Female">Female</option>
                                                        <option @if(Auth::user()->gender == 'Others') selected @endif value="Others">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" id="email" placeholder="Enter Email Id" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="date_of_birth" class="form-label">DOB</label>
                                                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="country_id" class="form-label">Country</label>
                                                    <select class="form-select" id="country_id" name="country">
                                                        <option selected disabled value>Choose...</option>
                                                        @foreach($countrys as $country)
                                                        <option @if(Auth::user()->permanent_country == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="states_id" class="form-label">State</label>
                                                    <select class="form-select" id="states_id" name="state">
                                                        <option selected disabled value>Please Choose Country</option>
                                                        @foreach($states as $state)
                                                        <option @if(Auth::user()->permanent_state == $state->id) selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="citys_id" class="form-label">City</label>
                                                    <select class="form-select" id="citys_id" name="city">
                                                        <option selected disabled value>Please Choose State</option>
                                                        @foreach($cities as $citie)
                                                        <option @if(Auth::user()->permanent_city == $citie->id) selected @endif value="{{ $citie->id }}">{{ $citie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="pin_code" class="form-label">Zip</label>
                                                    <input type="text" class="form-control" name="pin_code" id="pin_code" placeholder="Zip Code" value="{{ Auth::user()->pin_code }}">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" name="address" id="address" placeholder="Address ..." rows="4" cols="4">{{ Auth::user()->address }}</textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="input11" class="form-label">Change Profile Image</label>
                                                    <input class="form-control" name="user_image" type="file">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                                        <button type="submit" class="as_btn">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach($bookings as $booking)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Booking Date : {!! formated_date($booking->booking_date) !!} , Astrologer : {{ $booking->astrologer->name }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body" style="color: #5b6166;">
                                            Booking Date : {!! formated_date($booking->booking_date) !!}
                                            Astrologer : {{ $booking->astrologer->name }}

                                            <div class="bg-light mx-3 my-0 rounded-3 p-3">
                                                @foreach ($booking->prescriptions as $item)
                                                <div class="notes-item">
                                                    <p class="mb-2">
                                                        {{ $item->note }}
                                                    </p>
                                                    @if($item->prescriptionDocuments->count() > 0)
                                                    <div class="row">
                                                        @foreach($item->prescriptionDocuments as $document)
                                                            @if($document->file_type == 'image')
                                                            <div class="col-sm-2">
                                                                <img src="{{ asset($document->file_path) }}" class="img-thumb" style="width:50px;" alt="">
                                                            </div>
                                                            @elseif($document->file_type == 'video')
                                                            <div class="col-sm-2">
                                                                <video src="{{ asset($document->file_path) }}" class="video-thumb" data-video="{{ asset($document->file_path) }}" style="width:50px;" controls></video>
                                                            </div>
                                                            @elseif($document->file_type == 'pdf')
                                                            <div class="col-sm-2">
                                                                <embed src="{{ asset($document->file_path) }}" class="pdf-thumb" data-pdf="{{ asset($document->file_path) }}" type="application/pdf" style="width:100px; height:100px;" />
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    <p class="mb-0 text-end fst-italic text-secondary">{{ format_datetime($item->created_at) }}</p>
                                                </div>
                                                <hr class="border-dotted">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-enquiry" role="tabpanel">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach($enquirys as $enquiry)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Enquiry Date : {!! formated_date($enquiry->created_at) !!} , Subject : {{ $enquiry->subject }}, Status : {{ $enquiry->status }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body" style="color: #5b6166;">
                                            Enquiry Date : {!! formated_date($enquiry->created_at) !!}<br>
                                            Subject : {{ $enquiry->subject }}<br>
                                            Message : {{ $enquiry->message }}<br><hr><br>

                                            Admin Reply : {{ $enquiry->admin_reply }}
                                            @if($enquiry->admin_reply)
                                            Replied at : {!! formated_date($enquiry->updated_at) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-orders" role="tabpanel">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach($orders as $order)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Order Date : {!! format_datetime($order->created_at) !!} , Order number : {{ $order->order_number }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body" style="color: #5b6166;">
                                            @php 
                                                $order_items = $order->items; 
                                                $buyer_details = $order->addressBook;
                                            @endphp
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header bg-primary text-light">Order Details</div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    @if(!empty($delivery_partner))
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Delivery Partner</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $delivery_partner[0]->name }} ({{$delivery_partner[0]->mobile_no}}) </strong>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if($order->is_cancel == 1)
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Cancel Reason</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $order->cancel_cause }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Order Number</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $order->order_number }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Order Type</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right" id="order_type">{{ ucfirst($order->order_type) }}</strong>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Order Date</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right" id="order_type">{{ format_datetime($order->created_at) }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Payment Method</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">
                                                                                {{ ucfirst($order->payment_method) }}
                                                                            </strong>
                                                                        </div>
                                                                    </div> --}}
                                                                    {{-- <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Currency</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $order->price_currency }}</strong>
                                                                        </div>
                                                                    </div> --}}
                                                                    {{-- <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Payment Status</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ ucfirst($order->payment_status) }}</strong>
                                                                            @if($order->payment_status == 'Awaiting Payment' && $order->order_status != 'Cancelled' && $order->order_status != 'Rejected' && $order->payment_method == 'Cash On Delevery')
                                                                            <a href="#" class="btn btn-primary" data-bs-placement="top"  title="Edit this Item" data-bs-toggle="modal" data-bs-target="#updatePaymentStatusModal_<?= $order->id; ?>"><i class="fa fa-edit option-icon"></i>Update Payment Status</a>
                                                                            @endif
                                                                        </div>
                                                                    </div> --}}
                                                                    {{-- <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Payment Date</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $order->payment_date ? format_datetime($order->payment_date) : '' }}</strong>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                                
                                                                <div class="col-lg-6">
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Name</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $buyer_details->shipping_first_name .' '.$buyer_details->shipping_last_name }}</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $buyer_details->shipping_phone_number }}</strong>
                                                                        </div>
                                                                    </div>
                                    
                                                                    <div class="row mb-0">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Email</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ $buyer_details->shipping_email }}</strong>
                                                                        </div>
                                                                    </div>
                                    
                                                                    <div class="row mb-3">
                                                                        <label for="example-text-input" class="col-sm-4 col-form-label">Address</label>
                                                                        <div class="col-sm-8">
                                                                            <strong class="font-right">{{ get_address_by_id($buyer_details->id) }}</strong>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header bg-primary text-light">Order Items</div>
                                                        <div class="card-body">
                                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        {{-- <th>Product Id</th> --}}
                                                                        <th>Product</th>
                                                                        <th>Unit Price</th>
                                                                        <th>Quantity</th>
                                                                        <th>Gst</th>
                                                                        <th>Total</th>
                                                                        <!-- <th class="max-width-120">Options</th> -->
                                                                    </tr>
                                                                </thead>
                                    
                                                                <tbody>
                                                                    @php $subtotal = 0; @endphp
                                                                    @php $gst = 0; @endphp
                                                                    @php $shipping = 0; @endphp
                                                                    @foreach ($order_items as $item)
                                                                    <tr>
                                                                        {{-- <td>{{ $item->product_id }}</td> --}}
                                                                        <td>{{ $item->product_name }}</td>
                                                                        <td>{{ $item->price }}</td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ 0.00 }}</td>
                                                                        @php $subtotal += $item->subtotal @endphp
                                                                        <td>{{ $item->subtotal }}</td>
                                                                        <!-- <td>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    Options <i class="mdi mdi-chevron-down"></i>
                                                                                </button>
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <a href="#" class="dropdown-item" data-bs-placement="top"  title="Edit this Item" data-bs-toggle="modal" data-bs-target="#updateStatusModal_<?= $item->id; ?>"><i class="fa fa-edit option-icon"></i>Update order Status</a>
                                                                                    <div class="dropdown-divider"></div>
                                                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td> -->
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div class="col-lg-4 float-end">
                                                                <div class="row mb-0">
                                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Subtotal</label>
                                                                    <div class="col-sm-8"><strong class="float-end">{{ $subtotal }}</strong></div>
                                                                </div>
                                                                <div class="row mb-0">
                                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">GST</label>
                                                                    <div class="col-sm-8"><strong class="float-end">{{ $gst }}</strong></div>
                                                                </div>
                                                                <div class="row mb-0">
                                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Shipping</label>
                                                                    <div class="col-sm-8"><strong class="float-end">{{ $shipping }}</strong></div>
                                                                </div>
                                                                <div class="row mb-0">
                                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Discount</label>
                                                                    <div class="col-sm-8"><strong class="float-end">{{ $order->discounted_price }}</strong></div>
                                                                </div>
                                                                <div class="row mb-0">
                                                                    <label for="example-text-input" class="col-sm-4 col-form-label float-end">Total</label>
                                                                    <div class="col-sm-8"><strong class="float-end">{{ $order->total_amount }}</strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection