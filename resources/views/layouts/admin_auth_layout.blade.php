<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Souvagya</title>
    <!--favicon-->
	<link rel="icon" href="{{ asset('dashboard_asset/assets/images/favicon-32x32.png') }}" type="image/png">
    <!-- loader-->
	<link href="{{ asset('dashboard_asset/assets/css/pace.min.css') }}" rel="stylesheet">
	<script src="{{ asset('dashboard_asset/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('dashboard_asset/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/assets/plugins/metismenu/mm-vertical.css') }}">
    
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets/plugins/notifications/css/lobibox.min.css') }}">
    
    <!--bootstrap css-->
    <link href="{{ asset('dashboard_asset/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('dashboard_asset/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/responsive.css') }}" rel="stylesheet">

    @yield('style')
</head>

<body>

    @yield('content')


    <!--plugins-->
    <script src="{{ asset('dashboard_asset/assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    @include('admin.include.notification')

    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

    @yield('script')

</body>

</html>