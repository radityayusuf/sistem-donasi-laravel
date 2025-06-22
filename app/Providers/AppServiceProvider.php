<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;


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
        view()->composer('*', function () {
            if (Auth::check() && Auth::user()->donatur === null) {
                Auth::user()->donatur()->create([
                    'nama' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'telepon' => '085600110828', // ✅ Beri default kalau belum punya input
                ]);
            }
        });
    }
}
