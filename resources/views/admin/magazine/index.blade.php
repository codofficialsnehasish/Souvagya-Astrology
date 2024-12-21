@extends('layouts.admin_layout')

    @section('title') Magazine @endsection
    
    @section('content')
    
        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Magazine</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">All Magazines</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                        <div class="position-relative">
                            <input class="form-control px-5" type="search" placeholder="Search Magazines">
                            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                        </div>
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
                    </div>
                    <div class="col-auto">
                        @can('Magazine Create')
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <a class="btn btn-primary px-4" href="{{ route('magazines.create') }}"><i class="bi bi-plus-lg me-2"></i>Add New Magazine</a>
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
                                            <th class="text-wrap">Published At</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>PDF</th>
                                            <th>Status</th>
                                            @canany(['Magazine Edit','Magazine Delete'])
                                            <th>Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($magazines as $magazine)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox">
                                            </td>
                                            <td class="text-wrap">{!! format_datetime($magazine->created_at) !!}</td>
                                            <td class="text-wrap">{{$magazine->name}}</td>
                                            <td>{{ $magazine->description }}</td>
                                            <td><img class="img-thumbnail rounded me-2" src="{{ $magazine->getFirstMediaUrl('magazine-image') }}" width="100" alt=""></td>
                                            <td>
                                                <a href="{{ $magazine->getFirstMediaUrl('magazine-pdf') }}" target="_blank">
                                                    <iframe 
                                                        src="{{ $magazine->getFirstMediaUrl('magazine-pdf') }}" 
                                                        width="100" 
                                                        height="100" 
                                                        style="border: none;" 
                                                        title="PDF Preview">
                                                    </iframe>
                                                    Show PDF
                                                </a>
                                            </td>
                                            <td>{!! check_status($magazine->is_visible) !!}</td>
                                            @canany(['Magazine Edit','Magazine Delete'])
                                            <td>
                                                @can('Magazine Edit')
                                                <a class="btn btn-primary" href="{{ route('magazines.edit',$magazine->id) }}" alt="edit">Edit</a>
                                                @endcan
                                                @can('Magazine Delete')
                                                <form action="{{ route('magazines.destroy', $magazine->id) }}" method="POST" style="display:inline;">
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