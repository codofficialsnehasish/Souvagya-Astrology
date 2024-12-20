<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!auth()->check()) {
            if (!Cookie::has('guest_user_id')) {
                $guestUserId = uniqid('guest_',true);
                // $guestUserId = 'guest_' . Str::random(8);
                Cookie::queue('guest_user_id', $guestUserId, 60 * 24 * 30); // 30 days
            }
        }
    }
}
