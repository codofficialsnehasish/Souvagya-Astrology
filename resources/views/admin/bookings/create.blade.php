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
                                    <li class="breadcrumb-item active" aria-current="page">Create New Booking</li>
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

                <form class="needs-validation" action="{{ route('bookings.store') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Add Booking Details</div>
                                <div class="card-body">
                                    <div class="row">
                                        {{-- <div class="mb-3 col-md-6">
                                            <label class="form-label" for="booking-date">Booking Date</label>
                                            <input type="text" class="form-control datepicker" placeholder="Pick a Booking Date" name="booking_date" value="{{ old('booking_date') }}" id="booking-date" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please pick a date.</div>
                                        </div> --}}
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label" for="booking-date">Booking Date</label>
                                            <input type="text" class="form-control date-time" placeholder="Pick a Booking Date" name="booking_date" value="{{ old('booking_date') }}" id="booking-date" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please pick a date.</div>
                                        </div>
                                        {{-- <div class="mb-3 col-md-3">
                                            <label class="form-label">Start Time</label>
                                            <input type="time" class="form-control" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please pick a date.</div>
                                        </div> --}}
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label" for="end-time">End Time</label>
                                            <input type="time" class="form-control" id="end-time" name="end_time" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please pick a date.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="astrologer" class="form-label">Astrologers</label>
                                            <select id="astrologer" class="form-select" name="astrologer" required>
                                                <option selected disabled value>Choose Astrologer .....</option>
                                                @foreach($astrologers as $astrologer)
                                                <option value="{{ $astrologer->id }}">{{ $astrologer->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please choose a astrologer.</div>
                                            <div class="text-danger" id="astrologer-availability"></div>
                                        </div>
                                        <div class="mb-3 col-md-6" id="client-choose" style="display: block">
                                            <label for="single-select-field" class="form-label">Choose Client by Name or Phone | <a href="#" id="new-client-link">New Client</a></label>
                                            <select class="form-select" id="single-select-field" data-placeholder="Choose one client" name="client_id" required>
                                                <option value selected disabled>Choose Client by Name or Phone</option>
                                                @foreach($clients as $client)
                                                <option value="{{  $client->id }}">{{ $client->name }} | {{ $client->phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row" id="client-add" style="display: none">
                                            <p><a href="#" id="client-choose-link">Back to Choosing</a></p>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="name">Client Name</label>
                                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a name.</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phone">Client Phone No.</label>
                                                <input type="number" name="mobile" id="phone" value="{{ old('mobile') }}" class="form-control" placeholder="Enter phone number">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid phone number.</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="email">Client Email ID</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" id="email">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid email.</div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control" id="address" name="address" placeholder="Enter Address ..." rows="3"></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter a valid address.</div>
                                            </div>
                                        </div>
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
                                            <button type="submit" class="btn text-light btn-grd-primary px-4">Submit</button>
                                            <button type="reset" class="btn text-light btn-grd-info px-4">Reset</button>
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

    @section('script')
    <script>

        $(document).ready(function() {
            // Function to check astrologer availability
            function checkAstrologerAvailability() {
                $.ajax({
                    url: "{{ route('booking.check-astrologer-availability') }}",
                    type: "POST",
                    data: {
                        booking_date: $('#booking-date').val(),
                        end_time: $('#end-time').val(),
                        astrologer: $('#astrologer').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(resp) {
                        $('#astrologer-availability').text('');
                        // $('#astrologer-availability').text(resp.message);

                        $('#astrologer-availability').removeClass('text-danger text-success');

                        if (resp.status === 'success') {
                            $('#astrologer-availability').text(resp.message).addClass('text-success');
                        } else {
                            $('#astrologer-availability').text(resp.message).addClass('text-danger');
                        }
                    }
                });
            }

            // Event listener for booking date change
            $('#booking-date').on('change', function() {
                let bookingDateTime = new Date($(this).val());
                let endDateTime = new Date(bookingDateTime.getTime() + (60 * 60 * 1000)); // Adding 1 hour

                // Format the end time as HH:MM
                let hours = ('0' + endDateTime.getHours()).slice(-2);
                let minutes = ('0' + endDateTime.getMinutes()).slice(-2);
                $('#end-time').val(`${hours}:${minutes}`);

                // Check astrologer availability if astrologer is selected
                if ($('#astrologer').val()) {
                    checkAstrologerAvailability();
                }
            });

            // Event listener for end time change
            $('#end-time').on('change', function() {
                // Check astrologer availability if astrologer is selected
                if ($('#astrologer').val()) {
                    checkAstrologerAvailability();
                }
            });

            // Event listener for astrologer change
            $('#astrologer').on('change', function() {
                // Check astrologer availability when the astrologer is changed
                checkAstrologerAvailability();
            });

            $('#new-client-link').on('click', function(e) {
                e.preventDefault(); // Prevent the default anchor click behavior
                $('#client-add').toggle();
                $('#client-choose').toggle() // Toggle the visibility of the new client form

                $('#client-add input, #client-add textarea').attr('required', true);
                $('#client-choose select').removeAttr('required');
            });

            $('#client-choose-link').on('click', function(e) {
                e.preventDefault(); // Prevent the default anchor click behavior
                $('#client-add').toggle();
                $('#client-choose').toggle() // Toggle the visibility of the new client form
                $('#client-add input, #client-add textarea').removeAttr('required');
                $('#client-choose select').attr('required', true);
            });

            // let tomorrow = new Date();
            // tomorrow.setDate(tomorrow.getDate() + 1);

            // flatpickr("#booking-date", {
            //     minDate: tomorrow, // Set minimum date to tomorrow
            //     dateFormat: "Y-m-d",
            // });
        });
    </script>
    @endsection