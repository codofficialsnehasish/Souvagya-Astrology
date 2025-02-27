@extends('layouts.site_layout')

@section('title') Shop @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>shop</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_product_single_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <a href="{{ route('shops.details',$product->slug) }}">
                                <img src="{{ getProductMainImage($product->id) }}" alt="" class="img-responsive">
                            </a>
                            <ul>
                                <li><a href="javascript:void(0);" class="add-to-cart-btn" data-product-id="{{ $product->id }}"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading"><a href="{{ route('shops.details',$product->slug) }}">{{ $product->name }}</a></h4>
                        <span class="as_price">₹{{ $product->total_price }} <del>₹{{ $product->price }}</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection