<!doctype html>
<html lang="en" data-bs-theme="blue-theme">
<!-- <html lang="en" data-bs-theme="light"> -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Souvagya</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('dashboard_asset/assets/images/favicon-32x32.png') }}" type="image/png">
    <!-- loader-->
    <link href="{{ asset('dashboard_asset/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('dashboard_asset/assets/js/pace.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('dashboard_asset/assets/css/extra-icons.css') }}">
    <!--plugins-->
    <link href="{{ asset('dashboard_asset/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/assets/plugins/metismenu/mm-vertical.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_asset/assets/plugins/simplebar/css/simplebar.css') }}">

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
    <link href="{{ asset('dashboard_asset/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/sass/responsive.css') }}" rel="stylesheet">

    @yield('style')

</head>

<body>

    @include('admin.include.header')


    @include('admin.include.sidebar')

    @yield('content')


    @include('admin.include.footer')

    <!--bootstrap js-->
    <script src="{{ asset('dashboard_asset/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('dashboard_asset/assets/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('dashboard_asset/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ asset('dashboard_asset/assets/js/dashboard2.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/js/main.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('dashboard_asset/assets/plugins/validation/validation-script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notifications.min.js') }}"></script>
	<script src="{{ asset('dashboard_asset/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    
    @include('admin.include.notification')

    <script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()
	</script>

    <!-- for choosed image show -->
    <script>
        $('#imgInp').on('change', function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result).css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script>
		
		$(".datepicker").flatpickr();

		$(".time-picker").flatpickr({
				enableTime: true,
				noCalendar: true,
				dateFormat: "Y-m-d H:i",
			});

		$(".date-time").flatpickr({
				enableTime: true,
				dateFormat: "Y-m-d H:i",
		});

		$(".date-format").flatpickr({
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-range").flatpickr({
			mode: "range",
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
		});

		$(".date-inline").flatpickr({
			inline: true,
			altInput: true,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
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