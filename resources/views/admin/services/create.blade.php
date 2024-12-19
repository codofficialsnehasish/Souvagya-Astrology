@extends('layouts.admin_layout')

    @section('title') Services @endsection
    
    @section('content')

        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Services</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add New Services</li>
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
                            <a class="btn btn-primary px-4" href="{{ route('services.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <form class="needs-validation" action="{{ route('services.store') }}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card mt-4">
                                <div class="card-header text-center">Add Services Details</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter name" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control" value="{{ old('price') }}" name="price" id="price" placeholder="Enter price" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please enter a name.</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="duration_hours">Service Duration</label>
                                        <div class="d-flex align-items-center">
                                            <input type="number" name="duration_hours" id="duration_hours" class="form-control me-2" placeholder="Hours" min="0">
                                            <input type="number" name="duration_minutes" id="duration_minutes" class="form-control" placeholder="Minutes" min="0" max="59">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="sort_description">Sort Description</label>
                                        <textarea name="sort_description" class="form-control" placeholder="Enter Sort Description" id="sort_description">{{ old('sort_description') }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="long_description">Long Description</label>
                                        <textarea name="long_description" class="form-control" placeholder="Enter Sort Description" id="sort_description">{{ old('sort_description') }}</textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please enter a valid email.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-header text-center">Add Services Image</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <img class="img-thumbnail rounded me-2" id="blah" alt="" width="200" src="" data-holder-rendered="true" style="display: none;">
                                        </div>
                                        <div class="mb-0">
                                            <input class="form-control" name="image" type="file" id="imgInp">
                                        </div> 
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header text-center">Publish</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label mb-3 d-flex">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline1" name="is_active" class="form-check-input" value="1" checked>
                                                <label class="form-check-label" for="customRadioInline1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="customRadioInline2" name="is_active" class="form-check-input" value="0">
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