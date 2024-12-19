@extends('layouts.admin_layout')

@section('title','Products')

@section('content')

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Products</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        <!--end breadcrumb-->
        <div class="row g-3">
            <div class="col-auto">
                <div class="position-relative">
                    <input class="form-control px-5" type="search" placeholder="Search Products">
                    <span class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5">search</span>
                </div>
            </div>
            <div class="col-auto flex-grow-1 overflow-auto">
            </div>
            <div class="col-auto">
                @can('Astrologer Create')
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <a class="btn btn-primary px-4" href="{{ route('products.basic-info-create') }}"><i class="bi bi-plus-lg me-2"></i>Add New Products</a>
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
                                    <th>Sl.no</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proucts as $prouct)
                                <tr>
                                    <td>
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="text-wrap">{{ $loop->iteration }}</td>
                                    <td class="text-wrap">{{ $prouct->name }}</td>
                                    <td class="text-wrap">{!! $prouct->sort_description !!}</td>
                                    <td><img class="img-thumbnail rounded me-2" src="{{ getProductMainImage($prouct->id) }}" width="100" alt=""></td>
                                    <td>{!! check_status($prouct->is_visible) !!}</td>
                                    <td class="text-wrap">{{ format_datetime($prouct->created_at) }}</td>
                                    <td>
                                        @can('Astrologer Edit')
                                        <a class="btn btn-primary" href="{{ route('products.basic-info-edit',$prouct->id) }}" alt="edit">Edit</a>
                                        @endcan
                                        @can('Astrologer Delete')
                                        <form action="{{ route('products.delete', $prouct->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
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

@section('script')
<script>
    let table = new DataTable("#dataTable");
</script>
@endsection