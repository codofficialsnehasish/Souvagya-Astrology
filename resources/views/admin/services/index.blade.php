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
                                    <li class="breadcrumb-item active" aria-current="page">All Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                        <div class="position-relative">
                            <input class="form-control px-5" type="search" placeholder="Search Services">
                            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                        </div>
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
                    </div>
                    <div class="col-auto">
                        @can('Service Create')
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <a class="btn btn-primary px-4" href="{{ route('services.create') }}"><i class="bi bi-plus-lg me-2"></i>Add New Service</a>
                        </div>
                        @endcan
                    </div>
                </div><!--end row-->

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="product-table">
                            <div class="table-responsive white-space-nowrap">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <input class="form-check-input" type="checkbox">
                                            </th>
                                            <th class="text-wrap">Created At</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            @canany(['Service Edit','Service Delete'])
                                            <th>Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox">
                                            </td>
                                            <td class="text-wrap">{!! format_datetime($service->created_at) !!}</td>
                                            <td class="text-wrap">{{$service->name}}</td>
                                            <td>{{ $service->sort_description }}</td>
                                            <td>{{ $service->price }}</td>
                                            <td>{{ format_duration($service->duration) }}</td>
                                            <td>
                                                <img class="img-thumbnail rounded me-2" src="{{ asset($service->image) }}" width="200" alt="">
                                            </td>
                                            <td>{!! check_status($service->is_active) !!}</td>
                                            @canany(['Service Edit','Service Delete'])
                                            <td>
                                                @can('Service Edit')
                                                <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}" alt="edit">Edit</a>
                                                @endcan
                                                @can('Service Delete')
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                                @endcan
                                            </td>
                                            @endcanany
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @endsection