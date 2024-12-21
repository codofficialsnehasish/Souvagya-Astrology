@extends('layouts.admin_layout')

    @section('title') Enquirys @endsection
    
    @section('content')
    
        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Enquirys</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">All Enquirys</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                        <div class="position-relative">
                            <input class="form-control px-5" type="search" placeholder="Search Enquirys">
                            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                        </div>
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
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
                                            <th class="text-wrap">Date</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            @canany(['Enquiry Edit','Enquiry Delete'])
                                            <th>Action</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enquirys as $enquiry)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox">
                                            </td>
                                            <td class="text-wrap">{!! format_datetime($enquiry->created_at) !!}</td>
                                            <td class="text-wrap">{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->phone }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->subject }}</td>
                                            <td>{{ $enquiry->message }}</td>
                                            <td>{{ $enquiry->status }}</td>
                                            @canany(['Enquiry Edit','Enquiry Delete'])
                                            <td>
                                                @can('Enquiry Edit')
                                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$enquiry->id}}" alt="edit">Reply</a>
                                                @endcan
                                                @can('Enquiry Delete')
                                                <form action="{{ route('enquiry.destroy', $enquiry->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                                @endcan
                                            </td>
                                            @endcanany
                                        </tr>
                                        <div class="modal fade" id="staticBackdrop{{$enquiry->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Send Reply To {{ $enquiry->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('enquiry.update',$enquiry->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="position-relative">
                                                            <label for="admin_reply" class="form-label">Message</label>
                                                            <textarea name="admin_reply" class="form-control" id="admin_reply" rows="10" placeholder="Write the responce.." required="">{{ $enquiry->admin_reply }}</textarea>
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info">Save</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
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