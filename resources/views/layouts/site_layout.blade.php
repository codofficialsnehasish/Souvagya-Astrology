<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | Souvagya</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('site_asset/images/favicon.png') }}" type="image/x-icon">

    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site_asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site_asset/js/plugin/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_asset/js/plugin/airdatepicker/datepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_asset/css/fonts.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('site_asset/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets/plugins/notifications/css/lobibox.min.css') }}">
    @yield('style')
</head>
<body>
    <div class="as_loader">
        <img src="{{ asset('site_asset/images/loader.png') }}" alt="" class="img-responsive">
    </div> 
    <div class="as_main_wrapper">

        @include('site.include.header')

        @yield('content') 

        @include('site.include.footer')

        <section class="as_copyright_wrapper text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 2022 Souvagya. All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </section> 
    </div>
    

    <!-- Modal -->
    <div id="as_login" class="modal fade" tabindex="-1" aria-labelledby="as_login" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="as_login_box active">
                        <form id="loginForm">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter email" class="form-control" id="email">
                            </div>

                            <div id="verificationCodeInput" style="display:none;">
                                <div class="form-group">
                                    <input type="text" name="code" placeholder="Enter verification code" class="form-control">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="as_btn" name="action" value="verify">Verify and Login</button>
                                </div>
                            </div>

                            <div class="text-center" id="emailSubmit">
                                <button type="submit" class="as_btn" name="action" value="send_code">Send Verification Code</button>
                            </div>
                        </form>
                    </div>
                    <div class="as_signup_box">
                        <form action="{{ route('process-submit-details') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter name" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="Enter mobile number" class="form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <select name="gender" class="form-control" id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="as_btn">Submit</button>
                            </div>
                        </form>
                        <p class="text-center as_margin0 as_padderTop20">Have An Account ? <a href="javascript:;" class="as_orange as_login">Login</a></p>
                    </div> 
                </div>
            </div>
    
        </div>
    </div>

    <!-- javascript -->
    <script src="{{ asset('site_asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site_asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site_asset/js/plugin/slick/slick.min.js') }}"></script>
    <script src="{{ asset('site_asset/js/plugin/countto/jquery.countTo.js') }}"></script>
    <script src="{{ asset('site_asset/js/plugin/airdatepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('site_asset/js/plugin/airdatepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('site_asset/js/custom.js') }}"></script>  

    <script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    @include('admin.include.notification')

    <script>
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            
            // Determine which action was triggered by checking the value of the clicked button
            let action = $(this).find('button[type=submit][clicked=true]').val();
            
            if (action === 'send_code') {
                let sendCodeButton = $(this).find('button[type=submit][value="send_code"]');

                sendCodeButton.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...')
                       .attr('disabled', true);

                // Handle sending the verification code
                $.ajax({
                    type: "POST",
                    url: "{{ route('send-verification-code') }}",
                    data: {
                        email: $('#email').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#verificationCodeInput').show();
                        $('#emailSubmit').hide();
                        round_success_noti('Verification code sent to your email.');
                    },
                    error: function(xhr) {
                        // Handle error
                        const response = xhr.responseJSON || {}; 
                        sendCodeButton.text('Send Verification Code').attr('disabled', false);
                        round_error_noti(response.message); // Corrected 'massage' to 'message'
                    }
                });
            } else if (action === 'verify') {
                // Handle verification and login
                $.ajax({
                    type: "POST",
                    url: "{{ route('verify-code') }}",
                    data: {
                        email: $('#email').val(),
                        code: $('input[name=code]').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.status == 0){
                            $('.as_login_box').removeClass('active');
                            $('.as_signup_box').addClass('active');
                            round_success_noti(response.massage);
                        }

                        if(response.status == 1){
                            round_success_noti(response.massage);
                        }

                    },
                    error: function(response) {
                        round_error_noti('Error verifying the code.');
                    }
                });
            }
        });

        // Add clicked attribute to button on click
        $('#loginForm button[type=submit]').click(function() {
            $('button[type=submit]', $(this).closest('form')).removeAttr('clicked');
            $(this).attr('clicked', 'true');
        });
    </script>

    <script>
        $("#country_id").on('change', function(){ 
            $("#states_id").html('');
            const countryid= $(this).val();
            $.ajax({
                url : "{{ route('get-state-list') }}",
                data:{country_id : countryid, _token:"{{ csrf_token() }}"},
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#states_id').addClass('eventbtn'); 
                },
                success:function(response) {
                    $("#states_id").append('<option value="">Select State</option>');
                    $.each(response , function(index, item) { 
                        $("#states_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                    });
                    $('.spinner-border').hide();
                }
            });
        });

        $("#states_id").on('change', function(){ 
            $("#citys_id").html('');
            const stateid= $(this).val();
            $.ajax({
                url : "{{ route('get-city-list') }}",
                data:{state_id : stateid, _token:"{{ csrf_token() }}" },
                method:'post',
                dataType:'json',
                beforeSend: function(){
                    $('#citys_id').html('<option value="">Loading...</option>'); 
                    },
                success:function(response) {
                    $("#citys_id").html('');
                    $("#citys_id").append('<option value="">Select City</option>');
                    $.each(response , function(index, item) {
                        $("#citys_id").append('<option value="'+item.id+'">'+item.name+'</option>');
                    });
                }
            });
        });
    </script>

    @yield('script')
</body>
</html>