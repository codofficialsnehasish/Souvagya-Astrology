<?php
    use Carbon\Carbon;


    if (!function_exists('format_date_for_db')) {
        function format_date_for_db($datetime){
            $carbonDatetime = Carbon::parse($datetime);
            return $carbonDatetime->format('Y-m-d');
        }
    }

    if (!function_exists('formated_date')) {
        function formated_date($datetime){
            $carbonDatetime = Carbon::parse($datetime);
            return $carbonDatetime->format('d/m/Y');
        }
    }

    if (!function_exists('format_datetime')) {
        function format_datetime($datetime){
            $carbonDatetime = Carbon::parse($datetime);
            return $carbonDatetime->format('F d, Y h:i A');
        }
    }

    if (!function_exists('format_time')) {
        function format_time($datetime){
            $carbontime = Carbon::parse($datetime);
            return $carbontime->format('h:i A');
        }
    }

    if (!function_exists('formated_time')) {
        function formated_time($time){
            return date('h:i A', strtotime($time));
        }
    }


    if (!function_exists('get_weeks_in_this_month')){
        function get_weeks_in_this_month(){
            $now = Carbon::now();

            // Get the first and last day of the current month
            $firstDayOfMonth = $now->copy()->startOfMonth();
            $lastDayOfMonth = $now->copy()->endOfMonth();

            // Calculate the number of weeks in the current month
            $weeks = $firstDayOfMonth->weekOfMonth === 1 ? $lastDayOfMonth->weekOfMonth : $lastDayOfMonth->weekOfMonth + 1;

            // Output the number of weeks
            return $weeks;
        }
    }

    if (!function_exists('get_days_in_this_month')){
        function get_days_in_this_month(){
            $now = Carbon::now();
            $lastDayOfMonth = $now->copy()->endOfMonth();
            $daysInMonth = $lastDayOfMonth->day;
            return $daysInMonth;
        }
    }