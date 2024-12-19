@extends('layouts.site_layout')

@section('title') Services @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Services</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_service_wrapper as_padderTop50 as_padderBottom80">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="as_service_box text-center">
                        <span class="as_icon">
                            <img src="{{ asset($service->image) }}" alt="">                                   
                        </span>

                        <h4 class="as_subheading">{{ $service->name }}</h4>
                        <p>{!! $service->sort_description !!}</p>
                        <a href="{{ route('services.details',$service->slug) }}" class="as_link">read more</a>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
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
                </div> --}}
            </div>
        </div>
    </section>

@endsection