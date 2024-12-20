@extends('layouts.admin_layout')

    @section('title') Order @endsection
    
    @section('content')
    
        <main class="main-wrapper">
            <div class="main-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Order</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:;">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
                            <a class="btn btn-primary px-4" href="{{ route('order.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                        </div>
                    </div>
                </div><!--end row-->

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-light">Order Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        @if(!empty($delivery_partner))
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Delivery Partner</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $delivery_partner[0]->name }} ({{$delivery_partner[0]->mobile_no}}) </strong>
                                            </div>
                                        </div>
                                        @endif
                                        @if($order->is_cancel == 1)
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Cancel Reason</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $order->cancel_cause }}</strong>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Order Number</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $order->order_number }}</strong>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Order Type</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right" id="order_type">{{ ucfirst($order->order_type) }}</strong>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Order Date</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right" id="order_type">{{ format_datetime($order->created_at) }}</strong>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Payment Method</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">
                                                    {{ ucfirst($order->payment_method) }}
                                                </strong>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Currency</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $order->price_currency }}</strong>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Payment Status</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ ucfirst($order->payment_status) }}</strong>
                                                @if($order->payment_status == 'Awaiting Payment' && $order->order_status != 'Cancelled' && $order->order_status != 'Rejected' && $order->payment_method == 'Cash On Delevery')
                                                <a href="#" class="btn btn-primary" data-bs-placement="top"  title="Edit this Item" data-bs-toggle="modal" data-bs-target="#updatePaymentStatusModal_<?= $order->id; ?>"><i class="fa fa-edit option-icon"></i>Update Payment Status</a>
                                                @endif
                                            </div>
                                        </div> --}}
                                        {{-- <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Payment Date</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $order->payment_date ? format_datetime($order->payment_date) : '' }}</strong>
                                            </div>
                                        </div> --}}
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">User Name</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $buyer_details->shipping_first_name .' '.$buyer_details->shipping_last_name }}</strong>
                                            </div>
                                        </div>
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Phone Number</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $buyer_details->shipping_phone_number }}</strong>
                                            </div>
                                        </div>
        
                                        <div class="row mb-0">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ $buyer_details->shipping_email }}</strong>
                                            </div>
                                        </div>
        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8">
                                                <strong class="font-right">{{ get_address_by_id($buyer_details->id) }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-light">Order Items</div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            {{-- <th>Product Id</th> --}}
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Gst</th>
                                            <th>Total</th>
                                            <!-- <th class="max-width-120">Options</th> -->
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @php $subtotal = 0; @endphp
                                        @php $gst = 0; @endphp
                                        @php $shipping = 0; @endphp
                                        @foreach ($order_items as $item)
                                        <tr>
                                            {{-- <td>{{ $item->product_id }}</td> --}}
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ 0.00 }}</td>
                                            @php $subtotal += $item->subtotal @endphp
                                            <td>{{ $item->subtotal }}</td>
                                            <!-- <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Options <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="#" class="dropdown-item" data-bs-placement="top"  title="Edit this Item" data-bs-toggle="modal" data-bs-target="#updateStatusModal_<?= $item->id; ?>"><i class="fa fa-edit option-icon"></i>Update order Status</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove this Item"> <i class="fas fa-trash-alt text-danger" title="Remove"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-lg-4 float-end">
                                    <div class="row mb-0">
                                        <label for="example-text-input" class="col-sm-4 col-form-label float-end">Subtotal</label>
                                        <div class="col-sm-8"><strong class="float-end">{{ $subtotal }}</strong></div>
                                    </div>
                                    <div class="row mb-0">
                                        <label for="example-text-input" class="col-sm-4 col-form-label float-end">GST</label>
                                        <div class="col-sm-8"><strong class="float-end">{{ $gst }}</strong></div>
                                    </div>
                                    <div class="row mb-0">
                                        <label for="example-text-input" class="col-sm-4 col-form-label float-end">Shipping</label>
                                        <div class="col-sm-8"><strong class="float-end">{{ $shipping }}</strong></div>
                                    </div>
                                    <div class="row mb-0">
                                        <label for="example-text-input" class="col-sm-4 col-form-label float-end">Discount</label>
                                        <div class="col-sm-8"><strong class="float-end">{{ $order->discounted_price }}</strong></div>
                                    </div>
                                    <div class="row mb-0">
                                        <label for="example-text-input" class="col-sm-4 col-form-label float-end">Total</label>
                                        <div class="col-sm-8"><strong class="float-end">{{ $order->total_amount }}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    @endsection