@extends('layouts.site_layout')

@section('title') Contact Us @endsection

@section('content')

    <section class="as_breadcrum_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Contact</h1> 

                    <ul class="breadcrumb"> 
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="as_contact_section as_padderTop80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="as_contact_info">
                        <h1 class="as_heading">Contact Information</h1>
                        <p class="as_font14 as_margin0">Consectetur adipiscing elit sed do eiusmod tr incididunt<br> ut labore et dolore magna aliquauis ipsum.</p>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="as_info_box">
                                    <span class="as_icon"><img src="{{ asset('site_asset/images/svg/call1.svg') }}" alt=""></span>
                                    <div class="as_info">
                                        <h5>Call Us</h5>
                                        <p class="as_margin0 as_font14">+ (91) 1800-124-105</p>
                                        <p class="as_margin0 as_font14">+ (91) 1800-326-324</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="as_info_box">
                                    <span class="as_icon"><img src="{{ asset('site_asset/images/svg/mail.svg') }}" alt=""></span>
                                    <div class="as_info">
                                        <h5>Mail Us</h5>
                                        <p class="as_margin0 as_font14"><a href="javascript:;"> astrology@example.com</a></p>
                                        <p class="as_margin0 as_font14"><a href="javascript:;"></a>astro@example.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="as_contact_form">
                        <h4 class="as_subheading">Have A Question?</h4>
                        <form action="{{ route('contact-us-enquiry') }}" method="POST">
                            @csrf
                            @auth
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            @endauth
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" @auth value="{{ Auth::user()->name }}" @endauth id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" id="" @auth value="{{ Auth::user()->email }}" @endauth class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="mobile" id="" @auth value="{{ Auth::user()->phone }}" @endauth maxlength="10" minlength="10"  class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" id="" class="form-control" required></textarea>
                            </div>
                            <input type="submit" class="as_btn" value="Send Message">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="as_map_section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d921.4943697226569!2d88.37331526952428!3d22.505028137695827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0271307230ec8d%3A0x1ea9cf7f463a9f14!2s62%2FA%2C%20Selimpur%20Rd%2C%20Dhakuria%2C%20Selimpur%2C%20Kolkata%2C%20West%20Bengal%20700031!5e0!3m2!1sen!2sin!4v1733723075167!5m2!1sen!2sin" width="100%" height="743" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

@endsection
