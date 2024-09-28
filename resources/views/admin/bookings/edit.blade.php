@extends('layouts.admin_layout')

    @section('title') Bookings @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Bookings</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Booking</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <a class="btn btn-primary px-4" href="{{ route('bookings.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('bookings.update',$booking->id) }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Edit Booking Details</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="booking-date">Booking Date</label>
                                            <input type="text" class="form-control datepicker" placeholder="Pick a Booking Date" name="booking_date" value="{{ $booking->booking_date }}" id="booking-date" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please pick a date.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="input7" class="form-label">Astrologers</label>
                                            <select id="input7" class="form-select" name="astrologer" required>
                                                <option selected disabled value>Choose Astrologer .....</option>
                                                @foreach($astrologers as $astrologer)
                                                <option value="{{ $astrologer->id }}" @if($booking->astrologer_id == $astrologer->id) selected @endif>{{ $astrologer->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please choose a astrologer.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="name">Client Name</label>
                                            <input type="text" class="form-control" value="{{ $booking->user->name }}" name="name" id="name" placeholder="Enter name" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="phone">Client Phone No.</label>
                                            <input type="number" name="mobile" id="phone" value="{{ $booking->user->phone }}" class="form-control" required placeholder="Enter phone number">
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Client Email ID</label>
                                        <input type="email" name="email" class="form-control" value="{{ $booking->user->email }}" placeholder="Enter email" id="email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
										<label for="address" class="form-label">Address</label>
										<textarea class="form-control" id="address" name="address" placeholder="Enter Address ..." rows="3" required>{{ $booking->user->address }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid address.</div>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <!-- <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" checked>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0">
                                                <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                            </div>
                                        </div> -->
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                            <button type="reset" class="btn btn-grd-info px-4">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

    @endsection