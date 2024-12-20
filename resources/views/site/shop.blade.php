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
                                <li><a href="javascript:void(0);" id="add-to-cart-btn" data-product-id="{{ $product->id }}"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading"><a href="{{ route('shops.details',$product->slug) }}">{{ $product->name }}</a></h4>
                        <span class="as_price">₹{{ $product->total_price }} <del>₹{{ $product->price }}</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="as_product_box">
                        <div class="as_product_img">
                            <img src="https://dummyimage.com/286x339" alt="" class="img-responsive">

                            <ul>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                <li><a href="cart.html"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                <li><a href="shop.html"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                            </ul>
                        </div> 
                        <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                        <h4 class="as_subheading">Gemstone</h4>
                        <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- <section class="as_whychoose_wrapper as_padderTop80 as_padderBottom50">
        <div class="container">
            <div class="row as_verticle_center">
                <div class="col-lg-3 col-md-12">
                    <h1 class="as_heading">Why Choose Us</h1>
                    <p class="as_font14 as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut.</p>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="512"
                                    data-speed="5000">512</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Qualified Astrologers</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="62"
                                    data-speed="5000">62</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Success Horoscope</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="94"
                                    data-speed="5000">94</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Offices Worldwide</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="452"
                                    data-speed="5000">452+</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Trust by million clients</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="12"
                                    data-speed="5000">12</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Year experience</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="652"
                                    data-speed="5000">652+</span>+</span><img src="{{ asset('site_asset/images/svg/shape.svg') }}" alt=""></span>
                                <h4>Type of horoscopes</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="as_product_wrapper as_padderBottom80 as_padderTop80 as_product_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">Our Latest Products</h1>
                    <p class="as_font14 as_margin0 as_padderBottom20">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>

                    <div class="row as_product_slider">
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/wishlist.svg') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="#"><img src="{{ asset('site_asset/images/svg/compare.svg') }}" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection