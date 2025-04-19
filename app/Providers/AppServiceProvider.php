<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

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
            $locale = request('lang', Session::get('locale', config('app.locale')));
            App::setLocale($locale);
            Session::put('locale', $locale);
        });
        Schema::defaultStringLength(191); 
    }
}
