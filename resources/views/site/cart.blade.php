@extends('layouts.site_layout')

@section('title') Cart @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Cart</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_cartsingle_wrapper as_padderTop80 as_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="table-responsive a_cart_table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($carts as $cart)
                                <tr data-id="{{ $cart->id }}">
                                    <td>
                                        <span class="prod_thumb">
                                            <img src="{{ getProductMainImage($cart->product->id) }}" alt="" class="img-responsive">
                                        </span>
                                        <div class="product_details">
                                            <h4><a href="{{ route('shops.details',$cart->product->slug) }}">{{ $cart->product->name }}</a></h4>
                                        </div>
                                    </td>
                                    <td>₹{{ $cart->product->total_price }}</td>
                                    <td>
                                        <div class="prod_quantity as_padderBottom40">
                                            <div class="quantity">
                                                <button type="button" class="qty_button minus">-</button>
                                                <input type="text" id="quantity_6041ce9eca5d6" class="input-text form-control qty text" step="1" min="1" max="100" name="quantity" value="{{ $cart->quantity }}" title="Qty" inputmode="numeric">
                                                <button type="button" class="qty_button plus">+</button>
                                            </div>
                                        </div>
                                        {{-- <input type="number" name="pro_quantity" class="pro_quantity form-control" value="1"></td> --}}
                                    <td class="prod_total_price">₹{{ $cart->product->total_price * $cart->quantity }}</td>
                                    <td>
                                        <span class="close_pro">
                                            <img src="{{ asset('site_asset/images/svg/delete-red.svg') }}" style="height: 30px;" alt="">
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                    </td>
                                    <td>Total</td>
                                    <td id="cart-total"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('checkout') }}" class="proceed_btn as_btn" value="Apply Cupon Code">checkout</a>
                </div>
            </div>
        </div>
    </section>

@endsection