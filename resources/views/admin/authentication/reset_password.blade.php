@extends('layouts.admin_layout')

    @section('title') Change Password @endsection
    
    @section('content')

    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Change Password</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="d-flex justify-content-center">
                <div class="col-6">
                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-4">
                            <form class="needs-validation" action="{{ route('admin.process-change-password') }}" method="post" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="old_password">Enter Old Password</label>
                                    <input type="text" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter old password.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Enter New Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter New Password" id="password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter new password.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password_confirmation">Re-Enter New Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Enter Confirm Password" required>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">Please enter confirm password.</div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center justify-content-center gap-3">
                                        <button type="submit" class="btn btn-grd-primary px-4">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        
        </div>
    </main>

    @endsection