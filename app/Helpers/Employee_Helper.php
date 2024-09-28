<?php
    use Illuminate\Support\Str;
    use Carbon\Carbon;

    if (!function_exists('get_logo')) {
        function get_logo(){
            $logo = DB::table('settings')->select('logo')->get()[0]->logo;
            if($logo){
                return asset('site_data_images/'.$logo);
            }else{
                return asset('dashboard_assets/images/no-image.jpg');
            }
        }
    }

    if (!function_exists('get_icon')) {
        function get_icon(){
            $icon = DB::table('settings')->select('fabicon')->get()[0]->fabicon;
            // return $icon;
            if($icon){
                return asset('site_data_images/'.$icon);
            }else{
                return asset('dashboard_assets/images/no-image.jpg');
            }
        }
    }

    if (!function_exists('app_name')) {
        function app_name(){
            $name = DB::table('settings')->select('application_name')->get()[0]->application_name;
            return $name;
        }
    }

    if (!function_exists('copyright')) {
        function copyright(){
            $name = DB::table('settings')->select('copyright')->get()[0]->copyright;
            return $name;
        }
    }

    if (!function_exists('description')) {
        function description(){
            $site_description = DB::table('settings')->select('site_description')->get()[0]->site_description;
            return $site_description;
        }
    }

    if (!function_exists('get_address')) {
        function get_address(){
            $contact_address = DB::table('settings')->select('contact_address')->get()[0]->contact_address;
            return $contact_address;
        }
    }

    if (!function_exists('generateOTP')) {
        function generateOTP($n = 4) {
            $otp = "";
            for ($i = 0; $i < $n; $i++) {
                $otp .= rand(0, 9);
            }
            return $otp;
        }
    }


    



    
    if (!function_exists('check_status')){
        function check_status($status){
            if($status == 1){
                $str = '<span class="badge bg-success text-light" style="font-size:15px;">Active</span>';
            }else{
                $str = '<span class="badge bg-danger text-light" style="font-size:15px;">Inactive</span>';
            }
            return $str;
        }
    }

    if (!function_exists('check_verified')){
        function check_verified($status){
            if($status == 1){
                $str = '<span class="text-success" title="Verified"><i class="fas fa-check-circle"></i></span></p>';
            }else{
                $str = '<span class="text-danger" title="Not Verified"><i class="fas fa-times-circle"></i></span></p>';
            }
            return $str;
        }
    }

    if (!function_exists('check_visibility')) {
        function check_visibility($val)
        {
            if($val==1){
                $str='<span class="btn btn-success btn-sm"><i class="fas fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="Visible"></i></span>';
            }else{
                $str='<span class="btn btn-danger btn-sm"><i class="fas fa-eye-slash" data-bs-toggle="tooltip" data-bs-placement="top" title="Not Visible"></i></span>';
            }
            return $str;
        }
    }

    if (!function_exists('check_uncheck')) {
        function check_uncheck($val1,$val2)
        {
            if($val1==$val2){
                $str='checked';
            }else{
                $str='';
            }
            return $str;
        }
    }

    if (!function_exists('generateToken')) {
        function generateToken($length = 32) {
            $bytes = random_bytes($length);
            $apiKey = base64_encode($bytes);
            $urlSafeApiKey = str_replace(['+', '/', '='], ['-', ''], $apiKey);
            return $urlSafeApiKey;
        }
    }

    if (!function_exists('get_user_name')) {
        function get_user_name($field, $id){
            $user = DB::table('users')->where($field, $id)->first();
            if ($user) {
                return $user->name;
            } else {
                return null;
            }
        }
    }

    if (!function_exists('get_category_name')) {
        function get_category_name($id){
            $category = DB::table('categories')->where('id', $id)->first();
            if ($category) {
                return $category->name;
            } else {
                return null;
            }
        }
    }



    if (!function_exists('get_join_green_date')) {
        function get_join_green_date($datetime)
        {
            if($datetime != ''){
                return format_datetime($datetime);
            }else{
                return '';
            }
        }
    }
    
    

    if(!function_exists('createSlug')) {
        function createSlug($name, $model)
        {
            $slug = Str::slug($name);
            $originalSlug = $slug;

            $count = 1;
            while ($model::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            return $slug;
        }
    }

    if (!function_exists('is_have_image')) {
        function is_have_image($image) {
            if($image){
                return 'block';
            }else{
                return 'none';
            }
        }
    }

    if (!function_exists('get_product_by_id')) {
        function get_product_by_id($product_id){
            $product = Products::find($product_id);
            return $product;
        }
    }

    if (!function_exists('get_product_price_by_id')) {
        function get_product_price_by_id($product_id){
            $product = Products::find($product_id);
            return $product->price;
        }
    }

    if (!function_exists('get_product_name')) {
        function get_product_name($product_id){
            $product = Products::find($product_id);
            if($product){
                return $product->title;
            }else{
                return '';
            }
        }
    }


    if (!function_exists('is_disabled')) {
        function is_disabled($value){
            if($value){
                return 'disabled';
            }else{
                return '';
            }
        }
    }

    if (!function_exists('get_country_name')){
        function get_country_name($id){
            $country = DB::table('location_countries')->where('id',$id)->value('name');
            return $country;
        }
    }

    if (!function_exists('get_state_name')){
        function get_state_name($id){
            $state = DB::table('location_states')->where('id',$id)->value('name');
            return $state;
        }
    }

    if (!function_exists('get_city_name')){
        function get_city_name($id){
            $city = DB::table('location_cities')->where('id',$id)->value('name');
            return $city;
        }
    }