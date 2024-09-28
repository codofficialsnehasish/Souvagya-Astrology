@extends('layouts.admin_layout')

    @section('title') Employees @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Employees</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
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
                            <a class="btn btn-primary px-4" href="{{ route('employee') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('employee.update') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $employee->id }}">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Edit Employee Details</div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" value="{{ $employee->name }}" name="name" id="name" placeholder="Enter name" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a name.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email ID</label>
                                        <input type="email" name="email" class="form-control" value="{{ $employee->email }}" placeholder="Enter email" id="email" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone No.</label>
                                        <input type="number" name="mobile" id="phone" value="{{ $employee->phone }}" class="form-control" required placeholder="Enter phone number">
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                                    </div>
                                    {{--<div class="mb-3">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" name="password" id="pass" value="{{ old('password') }}" class="form-control" required placeholder="Enter Password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter password.</div>
                                    </div>--}}
                                    <div class="mb-3">
                                        <label class="form-label" for="select-role">Select Role</label>
                                        <div>
                                            <select name="roles" id="select-role" class="form-select">
                                                <option value selected disabled>Select a Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->name }}" {{ get_role($employee->id) == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Edit Employee Image</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="{{ asset($employee->profile_image) }}" data-holder-rendered="true" style="display: {{ is_have_image($employee->profile_image) }};">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="employee_image" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="status" class="form-check-input" value="1" {{ check_uncheck($employee->status,1) }}>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="status" class="form-check-input" value="0" {{ check_uncheck($employee->status,0) }}>
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