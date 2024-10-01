@extends('layouts.site_layout')

@section('title') Home @endsection

@section('content')

    <section class="as_banner_wrapper">
        <div class="container-fluid">
            <div class="row as_verticle_center">
                <div class="col-lg-6 order-lg-1 col-md-6 order-md-1 col-sm-12 order-sm-1 col-12 order-2">
                    <div class="as_banner_slider">
                        <div class="as_banner_detail">
                            <h5 class="as_orange">What’s Your Sign ?</h5>
                            <h1>Read Your Daily <br> Horoscope Today</h1>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore etesde dolore magna aliquapspendisse and the gravida.</p>
                            <a href="javascript:;" class="as_btn">read more</a>
                        </div>
                        <div class="as_banner_detail">
                            <h5 class="as_orange">What’s Your Sign ?</h5>
                            <h1>Read Your Daily <br> Horoscope Today</h1>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore etesde dolore magna aliquapspendisse and the gravida.</p>
                            <a href="javascript:;" class="as_btn">read more</a>
                        </div>
                        <div class="as_banner_detail">
                            <h5 class="as_orange">What’s Your Sign ?</h5>
                            <h1>Read Your Daily <br> Horoscope Today</h1>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore etesde dolore magna aliquapspendisse and the gravida.</p>
                            <a href="javascript:;" class="as_btn">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 col-md-6 order-md-2 col-sm-12 order-sm-2 col-12 order-1">
                    <div class="as_banner_img text-center">
                        <img src="{{ asset('site_asset/images/zodiac.png') }}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section> 

    {{--<section class="as_about_wrapper as_padderTop80 as_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="as_about_slider">
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="https://dummyimage.com/463x505" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="https://dummyimage.com/463x505" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="https://dummyimage.com/463x505" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="https://dummyimage.com/463x505" alt="" class="img-responsive">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <h1 class="as_heading">know about Astrology</h1>
                    <p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it esdehas a more-or less normal distribution of letters,</p>
                    <p>As opposed to using 'Content here, content here', making it look likesdesdee readable English.Many desktop publishing packages and web page editors sdesnow use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will usdencover many web sites still in their  web page editors sdesnow infancy.</p>
                    <a href="javascript:;" class="as_btn">read more</a>

                    <div class="as_contact_expert">
                        <span class="as_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="20" height="20" viewBox="0 0 20 20"> <defs><style>.cls-1{fill:#fff;fill-rule:evenodd}</style></defs> <path d="M19.797,10.487 C19.668,10.616 19.493,10.689 19.310,10.689 C18.929,10.689 18.620,10.380 18.620,9.999 C18.615,5.241 14.759,1.385 10.000,1.379 C9.619,1.379 9.310,1.070 9.310,0.689 C9.310,0.308 9.619,-0.000 10.000,-0.000 C15.520,0.006 19.993,4.478 19.999,9.999 C19.999,10.183 19.927,10.358 19.797,10.487 ZM15.172,9.999 C15.169,7.144 12.855,4.830 10.000,4.827 C9.619,4.827 9.310,4.518 9.310,4.138 C9.310,3.757 9.619,3.448 10.000,3.448 C13.617,3.452 16.547,6.383 16.551,9.999 C16.551,10.380 16.243,10.689 15.862,10.689 C15.481,10.689 15.172,10.380 15.172,9.999 ZM12.864,14.155 C13.076,14.182 13.288,14.109 13.438,13.957 L14.982,12.413 C15.209,12.186 15.563,12.146 15.835,12.317 L19.655,14.775 C19.955,14.965 20.063,15.350 19.905,15.668 L18.045,19.616 C17.918,19.873 17.645,20.024 17.360,19.995 C15.394,19.789 10.563,18.932 5.815,14.183 C1.067,9.435 0.210,4.604 0.003,2.638 C-0.026,2.352 0.125,2.079 0.382,1.952 L4.331,0.093 C4.649,-0.067 5.036,0.043 5.224,0.344 L7.684,4.164 C7.854,4.436 7.814,4.790 7.586,5.017 L6.042,6.560 C5.890,6.711 5.818,6.924 5.845,7.135 C5.942,7.900 6.373,9.809 8.282,11.718 C10.191,13.627 12.099,14.057 12.864,14.155 Z" class="cls-1"/> </svg>
                        </span>
                        <div>
                            <h5 class="as_white">Contact Our Expert Astrologers</h5>
                            <h1 class="as_orange">+ (91) 1800-124-105</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    <section class="as_service_wrapper as_padderTop80 as_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">our services</h1>
                    <p class="as_font14 as_padderBottom5">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service1.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Vastu Shastra</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service2.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Birth Journal</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service3.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Manglik Dosha</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service4.svg') }}" alt="">                               
                        </span>

                        <h4 class="as_subheading">Lal Kitab</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service5.svg') }}" alt="">                                
                        </span>

                        <h4 class="as_subheading">Crystal Ball</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service6.svg') }}" alt="">                                
                        </span>

                        <h4 class="as_subheading">Kundli Dosh</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service7.svg') }}" alt="">                                 
                        </span>

                        <h4 class="as_subheading">Tarot Reading</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service8.svg') }}" alt="">                                 
                        </span>

                        <h4 class="as_subheading">Palm Reading</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="javascript:;" class="as_link">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="as_zodiac_sign_wrapper as_padderTop80 as_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">choose zodiac sign</h1>
                    <p class="as_font14 as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>


                    <div class="as_zodiac_inner text-left">
                        <div class="row as_verticle_center">
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <ul class="as_sign_ul">
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign1.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Aries</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign2.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Taurus </h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign3.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Gemini</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign4.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Cancer</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign5.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Leo</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign6.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Virgo</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="as_sign_img text-center">
                                    <img src="{{ asset('site_asset/images/zodiac.png') }}" alt="" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <ul class="as_sign_ul as_sign_ul_right">
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign7.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Libra</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign8.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Scorpio</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign9.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Sagittarius</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign10.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Capricorn</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign11.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Capricorn</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="as_sign_box">
                                        <a href="javascript:;">
                                            <span class="as_sign">
                                            <img src="{{ asset('site_asset/images/svg/sign12.svg') }}" alt="">
                                            </span>
                                            <div>
                                                <h5>Pisces</h5>
                                                <p>Mar 21 - Apr 19</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="as_whychoose_wrapper as_padderTop80 as_padderBottom50">
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
                                    data-speed="5000">512</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Qualified Astrologers</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="62"
                                    data-speed="5000">62</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Success Horoscope</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="94"
                                    data-speed="5000">94</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Offices Worldwide</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="452"
                                    data-speed="5000">452+</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Trust by million clients</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="12"
                                    data-speed="5000">12</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Year experience</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="as_whychoose_box text-center">
                                <span class="as_number"><span><span data-from="0" data-to="652"
                                    data-speed="5000">652+</span>+</span><img src="assets/images/svg/shape.svg" alt=""></span>
                                <h4>Type of horoscopes</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="as_product_wrapper as_padderBottom80 as_padderTop80">
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/compare.svg" alt=""></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
                                        <li><a href="javascript:;"><img src="assets/images/svg/wishlist.svg" alt=""></a></li>
                                        <li><a href="javascript:;"><img src="assets/images/svg/cart.svg" alt=""><span>Add To Card</span></a></li>
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
    </section> --}}

    <section class="as_overview_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">Daily Planetary Overview</h1>
                    <p class="as_font14 as_margin0 as_padderBottom50">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>



                    <div class="as_overview_slider">
                        <div class="as_overview_inner">
                            <h4 class="as_orange">Mercury in Aries square Mars in Capricorn </h4>
                            <p class="as_font14">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum It has survived not only five rinter took a galley of type and scrambled it centuries, but also the passages,</p>
                            <span class="as_btn"><img src="assets/images/svg/calender.svg" alt=""> July 29, 2020</span> 
                        </div>
                        <div class="as_overview_inner">
                            <h4 class="as_orange">Mercury in Aries square Mars in Capricorn </h4>
                            <p class="as_font14">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum It has survived not only five rinter took a galley of type and scrambled it centuries, but also the passages,</p>
                            <span class="as_btn"><img src="assets/images/svg/calender.svg" alt=""> July 29, 2020</span> 
                        </div>
                        <div class="as_overview_inner">
                            <h4 class="as_orange">Mercury in Aries square Mars in Capricorn </h4>
                            <p class="as_font14">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum It has survived not only five rinter took a galley of type and scrambled it centuries, but also the passages,</p>
                            <span class="as_btn"><img src="assets/images/svg/calender.svg" alt=""> July 29, 2020</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

@endsection