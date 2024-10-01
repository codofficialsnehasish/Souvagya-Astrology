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
                                    <li class="breadcrumb-item active" aria-current="page">Today Appointments</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <!--end breadcrumb-->

                <div class="row g-3">
                    <div class="col-auto">
                        <div class="position-relative">
                            <input class="form-control px-5" type="search" placeholder="Search Bookings">
                            <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                        </div>
                    </div>
                    <div class="col-auto flex-grow-1 overflow-auto">
                    </div>
                    <div class="col-auto">
                        @can('Booking Create')
                        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                            <a class="btn btn-primary px-4" href="{{ route('bookings.create') }}"><i class="bi bi-plus-lg me-2"></i>Add New Booking</a>
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
                                            <th class="text-wrap">Booking Date</th>
                                            <th>Client Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Astrloger</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox">
                                            </td>
                                            <td class="text-wrap">{!! formated_date($booking->booking_date) !!}</td>
                                            <td class="text-wrap">{{ $booking->user->name }}</td>
                                            <td class="text-wrap">{{ $booking->user->phone }}</td>
                                            <td class="text-wrap">{{ $booking->user->email }}</td>
                                            <td class="text-wrap">{{ $booking->user->address }}</td>
                                            <td class="text-wrap">{{ $booking->astrologer->name }}</td>
                                            {{--<td>{!! check_status($booking->status) !!}</td>--}}
                                            @canany(['Booking Show','Booking Edit','Booking Delete'])
                                            <td>
                                                @can('Booking Show')
                                                <a class="btn btn-info" href="{{ route('bookings.show',$booking->id) }}" alt="edit">Details</a>
                                                @endcan
                                                @can('Booking Edit')
                                                <a class="btn btn-primary" href="{{ route('bookings.edit',$booking->id) }}" alt="edit">Edit</a>
                                                @endcan
                                                @can('Booking Delete')
                                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
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