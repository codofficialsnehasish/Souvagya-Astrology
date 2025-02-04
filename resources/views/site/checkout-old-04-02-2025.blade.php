@extends('layouts.site_layout')

@section('title') Checkout @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Checkout</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_checkout_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-sm-12 col-xs-12 offset-lg-1">
                    <div class="checkout_wrapper_box">
                        <ul id="progressbar">
                            <li class="active as_btn" data-active="1">Billing Details</li> 
                        </ul>
                        <form action="{{ route('checkout.process') }}" method="post">
                            @csrf
                        <div class="woocommerce_billing text-left step" data-target="1">
                            @if($address->isNotEmpty())
                                @foreach($address as $addr)
                                    <div class="radio form-check eachradio">
                                        <label>
                                            <input type="radio" name="addrradio" required class="form-check-input" required value="<?= $addr->id ?>" <?= $addr->is_default==1?'checked':'';?>>
                                            <p class="name"><?= $addr->billing_first_name?> <?= !empty($addr->billing_first_name)?', '.$addr->billing_phone_number:'';?></p>
                                            <p><?= get_address_by_id($addr->id)?></p>
                                            <div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                            <div class="radio form-check eachradio">
                                <label>
                                    <input type="radio" name="addrradio" class="form-check-input" required value="fornewaddr" @if($address->isEmpty()) checked @endif>
                                    <p class="name">Add New</p><div class="invalid-tooltip" style="width:23%;">Address is Required</div>
                                </label>
                            </div>
                            <div id="address-data-fild">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="First Name*" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last Name*" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone*" name="phone" value="{{ old('phone') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Email*" name="email" id="checkout-email" value="{{ old('email') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6" id="verification_code_div" style="display:none;">
                                        <div class="form-group">
                                            <input type="text" placeholder="Verification Code*" name="verification_code" id="checkout-email-code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group as_select_box">
                                            <select class="form-control" id="country_id" name="country" required>
                                                @foreach($countrys as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group as_select_box">
                                            <select class="form-control" id="states_id" name="state" required>
                                                <option value="">Select Country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group as_select_box">
                                            <select class="form-control" id="citys_id" name="city" required>
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Pincode*" name="pincode" value="{{ old('pincode') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea placeholder="Address*" class="form-control" name="address">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group checkbox as_login_data">
                                    <label>Ship To This Address
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="as_btn" data-step="2">Place Order</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

<script>
    $(document).ready(function () {
        const formRow = $('#address-data-fild');
    
        function toggleFormRow() {
            const selectedValue = $('input[name="addrradio"]:checked').val();
    
            if (selectedValue === 'fornewaddr') {
                // Show the row and make fields required
                formRow.show();
                formRow.find('input, textarea, select').prop('required', true);
            } else {
                // Hide the row and remove the required attribute
                formRow.hide();
                formRow.find('input, textarea, select').prop('required', false);
            }
        }
    
        // Attach change event to the radio buttons
        $('input[name="addrradio"]').on('change', toggleFormRow);
    
        // Initialize row visibility based on default selection
        toggleFormRow();
    });
</script>

@endsection
