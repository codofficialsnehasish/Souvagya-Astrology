@extends('layouts.site_layout')

@section('title') Services @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Services</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="#">Home</a></li>
                        <li>services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_service_wrapper as_padderTop50 as_padderBottom80">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service1.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Vastu Shastra</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service2.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Birth Journal</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service3.svg') }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">Manglik Dosha</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service4.svg') }}" alt="">                               
                        </span>

                        <h4 class="as_subheading">Lal Kitab</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service5.svg') }}" alt="">                                
                        </span>

                        <h4 class="as_subheading">Crystal Ball</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service6.svg') }}" alt="">                                
                        </span>

                        <h4 class="as_subheading">Kundli Dosh</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service7.svg') }}" alt="">                                 
                        </span>

                        <h4 class="as_subheading">Tarot Reading</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset('site_asset/images/svg/service8.svg') }}" alt="">                                 
                        </span>

                        <h4 class="as_subheading">Palm Reading</h4>
                        <p>Consectetur adipiscing elit sed do <br>eiusmod tempor incididunt.</p>
                        <a href="service_detail.html" class="as_link">read more</a>
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

    <section class="as_customer_wrapper as_padderBottom80 as_padderTop80">
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
    </section>

@endsection