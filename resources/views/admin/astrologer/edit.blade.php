@extends('layouts.admin_layout')

    @section('title') Astrologer @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Astrologer</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Astrologer</li>
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
                            <a class="btn btn-primary px-4" href="{{ route('astrologer.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('astrologer.update',$astrologer->id) }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Add Astrologer Details</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ $astrologer->name }}" name="name" id="name" placeholder="Enter name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email ID</label>
                                        <input type="email" name="email" class="form-control" value="{{ $astrologer->email }}" placeholder="Enter email" id="email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone No.</label>
                                        <input type="number" name="mobile" id="phone" value="{{ $astrologer->phone }}" class="form-control" required placeholder="Enter phone number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="aadhaar_number">Aadhaar Number</label>
                                        <input type="number" name="aadhaar_number" id="aadhaar_number" value="{{ $astrologer->aadhaar_number }}" class="form-control" placeholder="Enter Aadhaar Number" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter aadhaar number.</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label" for="aadhaar_number">Aadhaar Front Side</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="aadhar_front_blah" alt="" width="200" src="{{ asset($astrologer->aadhaar_front_side) }}" data-holder-rendered="true" style="display: {{ is_have_image($astrologer->aadhaar_front_side) }};">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="aadhar_front" type="file" id="aadhar_front">
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="aadhaar_number">Aadhaar Back Side</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="aadhar_back_blah" alt="" width="200" src="{{ asset($astrologer->aadhaar_back_side) }}" data-holder-rendered="true" style="display: {{ is_have_image($astrologer->aadhaar_back_side) }};">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="aadhar_back" type="file" id="aadhar_back">
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="aadhaar_number">Certificate (If Any)</label>
                                            <div class="mb-3">
                                                <img class="img-thumbnail rounded me-2" id="certificate_blah" alt="" width="200" src="{{ asset($astrologer->certificate) }}" data-holder-rendered="true" style="display: {{ is_have_image($astrologer->certificate) }};">
                                            </div>
                                            <div class="mb-0">
                                                <input class="form-control" name="certificate" type="file" id="certificate">
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Add Astrologer Image</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ asset($astrologer->profile_image) }}" data-holder-rendered="true" style="display: {{ is_have_image($astrologer->profile_image) }};">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="astrologer_image" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" {{ check_uncheck($astrologer->status,1) }}>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" {{ check_uncheck($astrologer->status,0) }}>
                                                <label class="form-check-label" for="customRadioInline2">Inactive</label>
                                            </div>
                                        </div>
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

    @section('script')
    <script>
        $('#aadhar_front').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aadhar_front_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#aadhar_back').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aadhar_back_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#certificate').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#certificate_blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    @endsection