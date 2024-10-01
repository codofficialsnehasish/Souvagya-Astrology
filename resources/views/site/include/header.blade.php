<section class="as_header_wrapper">
    <div class="as_logo">
        <a href="{{ route('home') }}" style="height: 60px;width: 148px;">
            <img src="{{ asset('site_asset/images/logo-souvagya.png') }}" alt="">
        </a>
    </div>
    <div class="as_header_detail">
        <div class="as_info_detail">
            <ul>
                <li>
                    <a href="javascript:;">
                        <div class="as_infobox">
                            <span class="as_infoicon">
                                <img src="{{ asset('site_asset/images/svg/headphone.svg') }}" alt="">
                            </span>
                        <span class="as_orange">Talk to our Astrogers -</span>+1800 326 3264
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="as_infobox">
                            <span class="as_infoicon">
                                <img src="{{ asset('site_asset/images/svg/mail1.svg') }}" alt="">
                            </span>
                        <span class="as_orange">Talk to our Astrogers -</span>support@website.com
                        </div>
                    </a>
                </li>
            </ul>
            <div class="as_right_info">
                @auth
                <a href="{{ route('user-dashboard') }}">
                    <div class="as_infobox">
                        <span class="as_infoicon">
                            <img src="{{ asset('site_asset/images/svg/login.svg') }}" alt="">
                        </span>
                        <span class="as_logintext">Dashboard</span>
                    </div>
                </a>
                <a href="{{ route('user-logout') }}" class="pl-5 pr-5">
                    <div class="as_infobox">
                        <span class="as_logintext">Logout</span>
                    </div>
                </a>
                @else
                <a href="javascript:void(0);">
                    <div class="as_infobox" data-bs-toggle="modal" data-bs-target="#as_login">
                        <span class="as_infoicon">
                            <img src="{{ asset('site_asset/images/svg/login.svg') }}" alt="">
                        </span>
                        <span class="as_logintext">Log in</span>
                    </div>
                </a>
                @endauth
            </div>
        </div>
        <div class="as_menu_wrapper">
            <span class="as_toggle bg_overlay">
                <img src="{{ asset('site_asset/images/svg/menu.svg') }}" alt="">
            </span>
            <div class="as_menu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">home</a></li>
                    <li><a href="javascript:void(0)">about</a></li>
                    <li><a href="javascript:void(0)">services</a></li>
                    <li><a href="javascript:void(0)">Our astrologers</a></li>
                    <li><a href="javascript:void(0)">appointment</a></li>
                    <li><a href="javascript:void(0)">contact</a></li>
                </ul>
            </div>
            <div class="as_search_wrapper">
                <img src="{{ asset('site_asset/images/search.png') }}" alt="" class="as_search">

                <div class="as_search_boxpopup">
                    <a href="javascript:;" class="as_cancel"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" x="0px" y="0px" viewBox="0 0 511.76 511.76" style="enable-background:new 0 0 511.76 511.76;" xml:space="preserve"> <g> <g> <path d="M436.896,74.869c-99.84-99.819-262.208-99.819-362.048,0c-99.797,99.819-99.797,262.229,0,362.048 c49.92,49.899,115.477,74.837,181.035,74.837s131.093-24.939,181.013-74.837C536.715,337.099,536.715,174.688,436.896,74.869z M361.461,331.317c8.341,8.341,8.341,21.824,0,30.165c-4.16,4.16-9.621,6.251-15.083,6.251c-5.461,0-10.923-2.091-15.083-6.251 l-75.413-75.435l-75.392,75.413c-4.181,4.16-9.643,6.251-15.083,6.251c-5.461,0-10.923-2.091-15.083-6.251 c-8.341-8.341-8.341-21.845,0-30.165l75.392-75.413l-75.413-75.413c-8.341-8.341-8.341-21.845,0-30.165 c8.32-8.341,21.824-8.341,30.165,0l75.413,75.413l75.413-75.413c8.341-8.341,21.824-8.341,30.165,0 c8.341,8.32,8.341,21.824,0,30.165l-75.413,75.413L361.461,331.317z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a>
                    <div class="as_search_inner">
                        <div class="as_search_widget">
                            <input type="text" name="" class="form-control" id="" placeholder="Search...">
                            <a href="#"><img src="{{ asset('site_asset/images/svg/search.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="as_body_overlay"></span>
    </div>  
</section> 