@extends('layouts.site_layout')

@section('title') Services Details @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Service Details</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Service Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_servicedetail_wrapper as_padderBottom80 as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-12 col-lg-8 col-md-12">
                    <div class="as_service_detail_inner">
                        <img src="{{ asset($service->image) }}" alt="" class="img-responsive">

                        <h1 class="as_heading">{{ $service->name }}</h1>

                        <p class="as_font14">{!! $service->long_description !!}</p>
                    </div> 
                </div>
                {{-- <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-12">
                    <div class="as_service_sidebar">
                        <div class="as_service_widget as_padderBottom40">
                            <h3 class="as_heading">Residential Vastu</h3>

                            <ul>
                                <li>
                                    <a href="javascript:;">
                                        <span>Bath Room</span>
                                        <span>( 210 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Bed Room</span>
                                        <span>( 62 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Study Room</span>
                                        <span>( 521 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Puja Room</span>
                                        <span>( 415 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Toilet</span>
                                        <span>( 52 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Guest Room</span>
                                        <span>( 75 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Dining Room</span>
                                        <span>( 20 )</span>
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        <div class="as_service_widget as_padderBottom40">
                            <h3 class="as_heading">Commercial Vastu</h3>

                            <ul>
                                <li>
                                    <a href="javascript:;">
                                        <span>Offices</span>
                                        <span>( 210 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Shop/Showroom</span>
                                        <span>( 62 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Industry</span>
                                        <span>( 521 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Hotels</span>
                                        <span>( 415 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Institutions</span>
                                        <span>( 52 )</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>Movie Halls</span>
                                        <span>( 75 )</span>
                                    </a>
                                </li> 
                                <li>
                                    <a href="javascript:;">
                                        <span>Factories</span>
                                        <span>( 20 )</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="as_service_widget as_download_box text-center">
                            <a href="javascript:;"><img src="assets/images/logo1.svg" alt=""></a>
                            <h3 class="as_subheading">Download the app now!</h3>

                            <a href="javascript:;" class="as_gplay"><img src="assets/images/gplay.png" alt=""></a>
                            <a href="javascript:;"><img src="assets/images/appstore.png" alt=""></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

@endsection