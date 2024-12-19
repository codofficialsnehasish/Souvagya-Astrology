@extends('layouts.site_layout')

@section('title') About @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>About us</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_about_wrapper as_padderTop80 as_padderBottom80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="as_about_slider">
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="{{ asset('site_asset/images/about/about1.png') }}" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="{{ asset('site_asset/images/about/about2.png') }}" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="{{ asset('site_asset/images/about/about3.png') }}" alt="" class="img-responsive">
                            </div> 
                        </div>
                        <div>
                            <div class="as_aboutimg text-right">
                                <img src="{{ asset('site_asset/images/about/about1.png') }}" alt="" class="img-responsive">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h1 class="as_heading">know about Astrology</h1>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it esdehas a more-or less normal distribution of letters,</p>
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

    {{-- <section class="as_customer_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="as_heading as_heading_center">What Our Customers Say</h1>
                    <p class="as_font14 as_margin0 as_padderBottom50">Consectetur adipiscing elit, sed do eiusmod tempor incididuesdeentiut labore <br>etesde dolore magna aliquapspendisse and the gravida.</p>

                    <div class="row as_customer_slider">
                        <div class="col-lg-6 col-md-6">
                            <div class="as_customer_box text-center">
                                <span class="as_customer_img">
                                    <img src="https://dummyimage.com/91x91" alt="">
                                    <span><img src="{{ asset('site_asset/images/svg/quote1.svg') }}" alt=""></span>
                                </span>
                                <p class="as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravidaesdisus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                <h3 >David Parker</h3>
                                <p class="as_margin0">Astrologer</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="as_customer_box text-center">
                                <span class="as_customer_img">
                                    <img src="https://dummyimage.com/91x91" alt="">
                                    <span><img src="{{ asset('site_asset/images/svg/quote1.svg') }}" alt=""></span>
                                </span>
                                <p class="as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravidaesdisus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                <h3 >John Parker</h3>
                                <p class="as_margin0">Astrologer</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="as_customer_box text-center">
                                <span class="as_customer_img">
                                    <img src="https://dummyimage.com/91x91" alt="">
                                    <span><img src="{{ asset('site_asset/images/svg/quote1.svg') }}" alt=""></span>
                                </span>
                                <p class="as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravidaesdisus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                <h3 >John Parker</h3>
                                <p class="as_margin0">Astrologer</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="as_customer_box text-center">
                                <span class="as_customer_img">
                                    <img src="https://dummyimage.com/91x91" alt="">
                                    <span><img src="{{ asset('site_asset/images/svg/quote1.svg') }}" alt=""></span>
                                </span>
                                <p class="as_margin0">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravidaesdisus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                <h3 >John Parker</h3>
                                <p class="as_margin0">Astrologer</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

@endsection