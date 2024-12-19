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
            {{-- <div class="col-auto">
                <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <a class="btn btn-primary px-4" href="{{ route('category.index') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                </div>
            </div> --}}
        </div><!--end row-->

        <form action="{{ route('products.price-edit-process') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            @include('admin.products.nav-tabs-edit')
                            <input type="hidden" name="product_id" value="{{ request()->segment(4) }}">
                            <!-- Tab panes -->

                            {{-- @if($product->product_type == 'simple') --}}
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="pricedetails" role="tabpanel">
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Price</label>
                                            <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="product_price" id="product_price_input" value="{{ $product->price }}" onkeyup="calculateTotPrice()">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Discount Rate</label>
                                            <div id="discount_input_container">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text input-group-text-currency" id="basic-addon-discount-variation">%</span>
                                                    </div>
                                                    <input type="number" name="discount_rate" id="input_discount_rate" aria-describedby="basic-addon-discount-variation" class="form-control form-input" value="{{ $product->discount_rate }}" min="0" max="99" placeholder="0" onkeyup="calculateTotPrice()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">GST<small>&nbsp;(Goods & Services Tax)</small></label>
                                            <div id="gst_input_container">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text-currency" id="basic-addon-gst">%</span>
                                                    </div>
                                                    <input type="number" name="gst_rate" id="input_gst_rate" aria-describedby="basic-addon-gst" class="form-control form-input" value="{{ $product->gst_rate }}" min="0" max="99" placeholder="0" onkeyup="calculateTotPrice()">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label class="form-label">Total Price</label>
                                            <input data-parsley-type="text" type="text" class="form-control" placeholder="" name="total_price" id="total_price_input" value="{{ $product->total_price }}" readonly>
                                        </div>

                                        <div class="row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Product Price :</label>
                                            <div class="col-sm-9 mt-2 fw-bold" id="product_price">
                                            {{ $product->product_price }}
                                            </div>
                                        </div>

                                        <div class="row calculated_gst_container">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">CGST ( <span id="cgst">{{ formatGSTRate($product->gst_rate,1) }}</span> ) :</label>
                                            <div class="col-sm-3 mt-2 fw-bold" id="cgst_amount">
                                            {{ get_cgst($product->gst_amount) }}
                                            </div>
                                        </div>

                                        <div class="row calculated_gst_container">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">SGST ( <span id="sgst">{{ formatGSTRate($product->gst_rate,1) }}</span> ) :</label>
                                            <div class="col-sm-3 mt-2 fw-bold" id="sgst_amount">
                                            {{ get_sgst($product->gst_amount) }}
                                            </div>
                                        </div>

                                        <div class="row calculated_gst_container">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">GST ( <span id="gst">{{ formatGSTRate($product->gst_rate) }}</span> ):</label>
                                            <div class="col-sm-3 mt-2 fw-bold" id="gst_amount">
                                            {{ $product->gst_amount }}
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label">Discount Price:</label>
                                            <div class="col-sm-9 mt-2 fw-bold" id="discount_price">
                                            {{ $product->discount_price }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- @endif --}}

                            @if($product->product_type == 'attribute')
                            <div class="row justify-content-center">
                                <div class="col-md-3 mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
                                        <i class="fas fa-plus me-2"></i> Add New 
                                    </button>
                                </div>
                                <div class="col-md-12 mt-3">
                                    {{-- {{ $product->variations }} --}}
                                    @if(!empty($product->variations))
                                    @foreach ($product->variations as $product)
                                        
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row">
                                                <label class="col-sm-6 col-form-label">Attribute Name : </label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                    {{ $product->lable_name }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-6 col-form-label">MRP</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                    {{ $product->price }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-6 col-form-label">Discount Rate</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                    {{ $product->discount_rate }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-6 col-form-label">GST<small>&nbsp;(Goods & Services Tax)</small></label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                    {{ $product->gst_rate }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-6 col-form-label">Dealer Price</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                    {{ $product->total_price }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            
                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-6 col-form-label">Product Price :</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                {{ $product->product_price }}
                                                </div>
                                            </div>
                    
                                            <div class="row calculated_gst_container">
                                                <label for="example-text-input" class="col-sm-6 col-form-label">CGST ( <span id="cgst">{{ formatGSTRate($product->gst_rate,1) }}</span> ) :</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                {{ get_cgst($product->gst_amount) }}
                                                </div>
                                            </div>
                    
                                            <div class="row calculated_gst_container">
                                                <label for="example-text-input" class="col-sm-6 col-form-label">SGST ( <span id="sgst">{{ formatGSTRate($product->gst_rate,1) }}</span> ) :</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                {{ get_sgst($product->gst_amount) }}
                                                </div>
                                            </div>
                    
                                            <div class="row calculated_gst_container">
                                                <label for="example-text-input" class="col-sm-6 col-form-label">GST ( <span id="gst">{{ formatGSTRate($product->gst_rate) }}</span> ):</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                {{ $product->gst_amount }}
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-6 col-form-label">Discount Price:</label>
                                                <div class="col-sm-6 mt-2 fw-bold">
                                                {{ $product->discount_price }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{ route('products.variation-delete',$product->id) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><i class="ti-trash"></i></a>
                                        </div>
                                        <hr>
                                    </div>

                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            Publish
                        </div>
                        <div class="card-body">
                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Save & Next
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade bs-example-modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.variation-edit-process') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ request()->segment(4) }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Attribute Name</label>
                            <input data-parsley-type="text" type="text" class="form-control" required placeholder="" name="label_name" value="">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">MRP</label>
                            <input data-parsley-type="text" type="text" class="form-control" required placeholder="0.00" name="product_price" id="product_price_input" value="" onkeyup="calculateTotPrice()">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Discount Rate</label>
                            <div id="discount_input_container">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text-currency" id="basic-addon-discount-variation">%</span>
                                    </div>
                                    <input type="number" name="discount_rate" id="input_discount_rate" aria-describedby="basic-addon-discount-variation" class="form-control form-input" value="" min="0" max="99" placeholder="0" onkeyup="calculateTotPrice()">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">GST<small>&nbsp;(Goods & Services Tax)</small></label>
                            <div id="gst_input_container">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text input-group-text-currency" id="basic-addon-gst">%</span>
                                    </div>
                                    <input type="number" name="gst_rate" id="input_gst_rate" aria-describedby="basic-addon-gst" class="form-control form-input" value="" min="0" max="99" placeholder="0" onkeyup="calculateTotPrice()">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Dealer Price</label>
                            <input data-parsley-type="text" type="text" class="form-control" placeholder="" name="total_price" id="total_price_input" value="" readonly>
                        </div>

                        <div class="row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Product Price :</label>
                            <div class="col-sm-9 mt-2 fw-bold" id="product_price">0.00
                        </div>

                        <div class="row calculated_gst_container">
                            <label for="example-text-input" class="col-sm-3 col-form-label">CGST ( <span id="cgst">0</span> ) :</label>
                            <div class="col-sm-3 mt-2 fw-bold" id="cgst_amount">0.00</div>
                        </div>

                        <div class="row calculated_gst_container">
                            <label for="example-text-input" class="col-sm-3 col-form-label">SGST ( <span id="sgst">0</span> ) :</label>
                            <div class="col-sm-3 mt-2 fw-bold" id="sgst_amount">0.00</div>
                        </div>

                        <div class="row calculated_gst_container">
                            <label for="example-text-input" class="col-sm-3 col-form-label">GST ( <span id="gst">0</span> ):</label>
                            <div class="col-sm-3 mt-2 fw-bold" id="gst_amount">0.00</div>
                        </div>
                        
                        <div class="row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Discount Price:</label>
                            <div class="col-sm-9 mt-2 fw-bold" id="discount_price">0.00</div>
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
</main>
@endsection

@section('script')
<script>
    function calculateTotPrice() {
        const price = parseFloat(document.getElementById('product_price_input').value) || 0;
        const discountRate = parseFloat(document.getElementById('input_discount_rate').value) || 0;
        const gstRate = parseFloat(document.getElementById('input_gst_rate').value) || 0;

        const discountAmount = (discountRate / 100) * price;
        const discountedPrice = price - discountAmount;
        const gstAmount = (gstRate / 100) * discountedPrice;
        // const totalPrice = discountedPrice + gstAmount;
        const totalPrice = discountedPrice;

        document.getElementById('total_price_input').value = totalPrice.toFixed(2);
        calculateGSTFromPrice();
    }

    function calculateGSTFromPrice() {
        // alert('hear')
        let price = parseFloat($('#product_price_input').val()) || 0;
        let discountRate = parseFloat($('#input_discount_rate').val()) || 0;
        let discountAmount = (discountRate / 100) * price;
        let totalPrice = price - discountAmount;
        // let totalPrice = parseFloat($("#offer_price").val());
        let gstRate = parseFloat($("#input_gst_rate").val());
        $('#cgst').html(gstRate/2+'%');
        $('#sgst').html(gstRate/2+'%');
        $('#gst').html(gstRate+'%');
        // Calculate the GST amount
        gstRate = gstRate/100;
        const gstAmount = (totalPrice * gstRate) / (1 + gstRate);
        // Calculate the base price
        const basePrice = totalPrice - gstAmount;
        $("#product_price").html(basePrice.toFixed(2));
        $("#cgst_amount").html(gstAmount.toFixed(2)/2);
        $("#sgst_amount").html(gstAmount.toFixed(2)/2);
        $("#gst_amount").html(gstAmount.toFixed(2));
        $("#discount_price").html(discountAmount.toFixed(2));

    }
</script>
@endsection