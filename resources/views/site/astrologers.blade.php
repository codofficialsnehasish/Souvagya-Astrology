@extends('layouts.site_layout')

@section('title') Astrologers @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Astrologer</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Astrologer</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section class="as_team_wrapper as_padderTop80 as_padderBottom50">
        <div class="container">
            <div class="row">

                @foreach($astrologers as $astrologer)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img" style="height:210px;">
                            <img src="{{ asset($astrologer->profile_image) }}" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">{{ $astrologer->name }}</h3>
                        <p>{{ ucfirst($astrologer->role) }}</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Marie J. Vela</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Judith Travis</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Mary Freeman</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Julio McDaniel</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Lawrence Soto</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Clarence Kissel</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="as_team_box text-center">
                        <div class="as_team_img">
                            <img src="https://dummyimage.com/200x200" alt="" class="img-responsive">
                        </div>
                        <h3 class="as_subheading">Doris Tierney</h3>
                        <p>Astrologer</p>
                        <div class="as_share_box">
                            <ul>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/facebook.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/twitter.svg') }}" alt=""></a></li>
                                <li><a href="javascript:;"><img src="{{ asset('site_asset/images/svg/google.svg') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}

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
                            <span class="as_btn"><img src="{{ asset('site_asset/images/svg/calender.svg') }}" alt=""> July 29, 2020</span> 
                        </div>
                        <div class="as_overview_inner">
                            <h4 class="as_orange">Mercury in Aries square Mars in Capricorn </h4>
                            <p class="as_font14">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum It has survived not only five rinter took a galley of type and scrambled it centuries, but also the passages,</p>
                            <span class="as_btn"><img src="{{ asset('site_asset/images/svg/calender.svg') }}" alt=""> July 29, 2020</span> 
                        </div>
                        <div class="as_overview_inner">
                            <h4 class="as_orange">Mercury in Aries square Mars in Capricorn </h4>
                            <p class="as_font14">Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum It has survived not only five rinter took a galley of type and scrambled it centuries, but also the passages,</p>
                            <span class="as_btn"><img src="{{ asset('site_asset/images/svg/calender.svg') }}" alt=""> July 29, 2020</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

@endsection