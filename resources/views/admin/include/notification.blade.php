@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        $(document).ready(function(){
            round_error_noti('{{ $error }}');
        });
    </script>
    @endforeach
@endif

@if(Session::has("error"))
    <script>
        $(document).ready(function(){
            round_error_noti('{{Session::get("error")}}');
        });
    </script>
@endif

@if(Session::has("success"))
    <script>
        $(document).ready(function(){
            round_success_noti('{{Session::get("success")}}');
        });
    </script>
@endif

<script>
    // round_info_noti()
    
    // round_warning_noti()
    
    // round_error_noti()
    
    // round_success_noti()
</script>
