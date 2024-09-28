@extends('layouts.admin_layout')

    @section('title') Profile @endsection
    
    @section('content')

    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }} Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card rounded-4">
                <div class="card-body p-4">
                    <div class="position-relative mb-5">
                        <img src="assets/images/gallery/profile-cover.png" class="img-fluid rounded-4 shadow" alt="">
                        <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                            <img src="{{ asset(Auth::user()->profile_image) }}" class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170" alt="">
                        </div>
                    </div>
                    <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3>{{ Auth::user()->name }}</h3>
                        </div>
                    </div>
                    <div class="kewords d-flex align-items-center gap-3 mt-4 overflow-x-auto">
                        <button type="button" class="btn btn-sm btn-light rounded-5 px-4">{{ get_role(Auth::id()) }}</button>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-xl-8">
                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">Edit Profile</h5>
                                </div>
                            </div>
                            <form class="row g-4" action="{{ route('profile.update-profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" id="name" placeholder="Enter name" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email ID</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Enter email" id="email" readonly required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="phone">Phone No.</label>
                                    <input type="number" name="mobile" id="phone" value="{{ Auth::user()->phone }}" class="form-control" required placeholder="Enter phone number" readonly>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter a valid phone number.</div>
                                </div>
                                <div class="col-md-12">
                                    <label for="input11" class="form-label">Address</label>
                                    <textarea class="form-control" id="input11" name="address" placeholder="Address ..." rows="4" cols="4">{{ Auth::user()->address }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="input11" class="form-label">Change Profile Image</label>
                                    <input class="form-control" name="employee_image" type="file">
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd-primary px-4">Update Profile</button>
                                        <button type="reset" class="btn btn-light px-4">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  

                <div class="col-12 col-xl-4">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">About</h5>
                                </div>
                            </div>
                            <div class="full-info">
                                <div class="info-list d-flex flex-column gap-3">
                                    <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">account_circle</span><p class="mb-0">Full Name: {{ Auth::user()->name }}</p></div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">done</span><p class="mb-0">Status: @if(Auth::user()->status == 1) Active @else Inactive @endif</p></div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">code</span><p class="mb-0">Role: {{ get_role(Auth::id()) }}</p></div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">send</span><p class="mb-0">Email: {{ Auth::user()->email }}</p></div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span class="material-icons-outlined">call</span><p class="mb-0">Phone: {{ Auth::user()->phone }}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!--end row-->
        
        </div>
    </main>

    @endsection