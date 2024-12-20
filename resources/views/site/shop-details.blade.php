@extends('layouts.site_layout')

@section('title') Shop @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Shop Details</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>shop Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_shopsingle_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="as_shopsingle_slider">
                        <div class="as_shopsingle_for">
                            @foreach($product_images as $product_image)
                            <div class="as_prod_img">
                                <img src="{{ $product_image->getUrl() }}" alt="" class="img-responsive">
                            </div>
                            @endforeach
                        </div>
                        <div class="as_shopsingle_nav">
                            @foreach($product_images as $product_image)
                            <div class="as_prod_img">
                                <img src="{{ $product_image->getUrl() }}" alt="" class="img-responsive">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="as_product_description">
                        <h3 class="as_subheading as_margin0 as_padderBottom10">{{ $product->name }}</h3>
                        <h2 class="as_price">₹{{ $product->total_price }} <del>₹{{ $product->price }}</del></h2> 
                        <div class="product_rating as_padderBottom10">
                            {{-- <span class="ref_number as_font14">Ref No. 1456328</span>  --}}
                            <span class="rating_star">
                                <img src="assets/images/rating.png" alt="">
                            </span>
                        </div>
                        {{-- <p class="as_font14 as_padderBottom10"> --}}
                            {!! $product->sort_description !!}
                        {{-- </p> --}}
                        <div class="stock_details as_padderBottom10"><span>8 In Stock</span></div>
                        <div class="prod_quantity as_padderBottom40">
                            Quantity
                            <div class="quantity">
                                <button type="button" class="qty_button minus">-</button>
                                <input type="text" id="quantity_6041ce9eca5d6" class="input-text form-control qty text" step="1" min="1" max="100" name="quantity" value="1" title="Qty" inputmode="numeric">
                                <button type="button" class="qty_button plus">+</button>
                            </div>
                        </div>
                        <div class="product_buy">
                            <button type="button" id="add-to-cart-btn" class="buy_btn as_btn" data-product-id="{{ $product->id }}">Add To Cart</button>
                            <a href="https://wa.me/7031182870?text=Hello,%20I%20am%20interested%20in%20this%20product:%20{{ request()->url() }}" 
                                target="_blank" 
                                class="contact_whatsapp ad_wishlist">
                                <img src="{{ asset('site_asset/images/whats-app.png') }}" alt="" style="height: 22px;">
                                Contact on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="as_tab_wrapper as_padderTop80">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Today" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab" aria-controls="today" aria-selected="true">Descriptions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Tomorrow" data-bs-toggle="tab" data-bs-target="#tomorrow" type="button" role="tab" aria-controls="tomorrow" aria-selected="false">Review</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="Today"> 
                            <h3 class="as_subheading as_orange">Description</h3>
                            <p class="as_font14 as_padderBottom20">{!! $product->long_description !!}</p>
                            </div>
                            <div class="tab-pane fade" id="tomorrow" role="tabpanel" aria-labelledby="Tomorrow"> 
                            <h3 class="as_subheading as_orange">Review</h3>
                            <p class="as_font14 as_padderBottom20">There are no review yet</p>

                            <h3 class="as_subheading as_orange">Add A Review</h3>
                            <p class="as_font14 as_padderBottom20">Your email address will not be published.</p>

                            <form action="">
                                <div class="form-group">
                                    <textarea name="" id="" placeholder="Your Review" class="form-control"></textarea>
                                </div>

                                <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="Your Name" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control" placeholder="Your Email" class="form-control" id="">
                                            </div>
                                        </div>
                                </div>

                                <button class="as_btn">submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($related_products->isNotEmpty())
    <section class="as_product_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">Related Products</h1>
                    <p class="as_font14 as_margin0 as_padderBottom20">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>

                    <div class="row as_product_slider">
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="as_product_box">
                                <div class="as_product_img">
                                    <img src="https://dummyimage.com/310x367" alt="" class="img-responsive">

                                    <ul>
                                        <li><a href="cart.html"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="cart.html"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="shop.html"><img src="assets/images/svg/compare.svg" alt=""></a></li>
                                    </ul>
                                </div> 
                                <span><img src="assets/images/rating.png" alt=""></span>
                                <h4 class="as_subheading">Gemstone</h4>
                                <span class="as_price">$20 <del>$80</del> <span class="as_orange">(60% off)</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection