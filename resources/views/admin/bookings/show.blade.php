@extends('layouts.admin_layout')

    @section('title') Booking Details @endsection
    
    @section('content')
    
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Booking</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="mb-3 fw-bold text-center">Client Details</h5>
                            <div class="position-relative">
                                <!-- <img src="assets/images/gallery/18.png" class="img-fluid rounded" alt=""> -->
                                @if(!empty($booking->user->profile_image))
                                <div class="position-absolute top-100 start-50 translate-middle">
                                    <img src="{{ asset($booking->user->profile_image) }}" width="100" height="100" class="rounded-circle raised p-1 bg-white" alt="">
                                </div>
                                @endif
                            </div>
                            <div class="mt-5 pt-4">
                                <h6 class="mb-3">Name : {{ $booking->user->name }}</h6>
                                <h6 class="mb-3">Email : {{ $booking->user->email }}</h6>
                                <h6 class="mb-3">Phone : {{ $booking->user->phone }}</h6>
                                <h6 class="mb-3">Address : {{ $booking->user->address }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 d-flex">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="mb-3">Send Notes to Client</h5>
                            <form action="{{ route('booking.process-prescription') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <textarea class="form-control" name="note" placeholder="Write Note" rows="6" cols="6" required></textarea>
                                <div class="mb-3">
                                    <label class="form-label mt-3" for="documents">Upload Documents</label>
                                    <input class="form-control" name="documents[]" type="file" id="documents" multiple>
                                </div>
                                <button type="submit" class="btn btn-filter w-100 mt-3">Submit</button>
                            </form>
                        </div>
                        <div class="customer-notes mb-3">
                            <div class="bg-light mx-3 my-0 rounded-3 p-3">
                                @foreach ($prescription as $item)
                                <div class="notes-item">
                                    <p class="mb-2">
                                        {{ $item->note }}
                                        <a href="{{ route('booking.delete-prescription-note',$item->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i> Delete Note</a>
                                    </p>
                                    @if($item->prescriptionDocuments->count() > 0)
                                        <div class="row">
                                        @foreach($item->prescriptionDocuments as $document)
                                            @if($document->file_type == 'image')
                                            <div class="col-sm-2">
                                                <img src="{{ asset($document->file_path) }}" class="img-thumb" style="width:50px;" alt="">
                                                <a href="{{ route('booking.delete-prescription-documents',$document->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i></a>
                                            </div>
                                            @elseif($document->file_type == 'video')
                                            <div class="col-sm-2">
                                                <video src="{{ asset($document->file_path) }}" class="video-thumb" data-video="{{ asset($document->file_path) }}" style="width:50px;" controls></video>
                                                <a href="{{ route('booking.delete-prescription-documents',$document->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i></a>
                                            </div>
                                            @elseif($document->file_type == 'pdf')
                                            <div class="col-sm-2">
                                                <embed src="{{ asset($document->file_path) }}" class="pdf-thumb" data-pdf="{{ asset($document->file_path) }}" type="application/pdf" style="width:100px; height:100px;" />
                                                <a href="{{ route('booking.delete-prescription-documents',$document->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash"></i></a>
                                            </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    @endif
                                    <p class="mb-0 text-end fst-italic text-secondary">{{ format_datetime($item->created_at) }}</p>
                                </div>
                                <hr class="border-dotted">
                                @endforeach
                                <!-- <hr class="border-dotted">
                                <div class="notes-item">
                                    <p class="mb-2">Various versions have evolved over the years, sometimes</p>
                                    <p class="mb-0 text-end fst-italic text-secondary">15 Apr, 2022</p>
                                </div>
                                <hr>
                                <div class="notes-item">
                                    <p class="mb-2">There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered
                                        alteration in some</p>
                                    <p class="mb-0 text-end fst-italic text-secondary">15 Apr, 2022</p>
                                </div>
                                <hr>
                                <div class="notes-item">
                                    <p class="mb-2">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to
                                        demonstrate. quae ab illo inventore veritatis et quasi architecto</p>
                                    <p class="mb-0 text-end fst-italic text-secondary">18 Apr, 2022</p>
                                </div>
                                <hr>
                                <div class="notes-item">
                                    <p class="mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                        piece of classical Latin literature</p>
                                    <p class="mb-0 text-end fst-italic text-secondary">22 Apr, 2022</p>
                                </div>
                                <hr> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            {{--<div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Orders<span class="fw-light ms-2">(98)</span></h5>
                    <div class="product-table">
                        <div class="table-responsive white-space-nowrap">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Order</th>
                                        <th>Expense</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Delivery Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#2453</td>
                                        <td>$865</td>
                                        <td>
                                            <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">
                                                Paid<i class="bi bi-check2 ms-2"></i>
                                            </span>
                                        </td>
                                        <td><span
                                            class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                        <td>Cash on delivery</td>
                                        <td>Jun 12, 12:56 PM</td>
                                        <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                    class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#7845</td>
                                        <td>$427</td>
                                        <td><span
                                            class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-primary-subtle text-primary rounded border border-primary-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                        <td>Cash on delivery</td>
                                        <td>Jun 12, 12:56 PM</td>
                                        <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                    class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#9635</td>
                                        <td>$123</td>
                                        <td><span
                                            class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Pending<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                        <td>Cash on delivery</td>
                                        <td>Jun 12, 12:56 PM</td>
                                        <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                    class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#2415</td>
                                        <td>$986</td>
                                        <td><span
                                            class="lable-table bg-primary-subtle text-primary rounded border border-primary-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2-all ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Pending<i
                                            class="bi bi-info-circle ms-2"></i></span></td>
                                        <td>Cash on delivery</td>
                                        <td>Jun 12, 12:56 PM</td>
                                        <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                    class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#3526</td>
                                        <td>$104</td>
                                        <td><span
                                            class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Failed<i
                                            class="bi bi-x-lg ms-2"></i></span></td>
                                        <td><span
                                            class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Completed<i
                                            class="bi bi-check2 ms-2"></i></span></td>
                                        <td>Cash on delivery</td>
                                        <td>Jun 12, 12:56 PM</td>
                                        <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-eye-fill me-2"></i>View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Export</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:;"><i
                                                    class="bi bi-trash-fill me-2"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </main>

    @endsection

    @section('script')
    <script>
        $(document).ready(function() {
            $('.img-thumb').on('click', function() {
                var imgSrc = $(this).attr('src');
                var newWindow = window.open('', '_blank', 'width=800,height=600');
                newWindow.document.write('<html><head><title>Image</title></head><body style="margin:0;display:flex;justify-content:center;align-items:center;height:100vh;"><img src="' + imgSrc + '" style="max-width:100%;max-height:100%;"></body></html>');
            });

            // Click to open PDF
            $('.pdf-thumb').on('click', function() {
                var pdfSrc = $(this).attr('data-pdf'); // Store the PDF link in a data attribute
                var newWindow = window.open(pdfSrc, '_blank', 'width=800,height=600');
            });

            // Click to play video in a new window
            $('.video-thumb').on('click', function() {
                var videoSrc = $(this).attr('data-video'); // Store the video link in a data attribute
                var newWindow = window.open('', '_blank', 'width=800,height=600');
                newWindow.document.write('<html><head><title>Video</title></head><body style="margin:0;display:flex;justify-content:center;align-items:center;height:100vh;"><video src="' + videoSrc + '" controls style="max-width:100%;max-height:100%;"></video></body></html>');
            });
        });
    </script>
    @endsection