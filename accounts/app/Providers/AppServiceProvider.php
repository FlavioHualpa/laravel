<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
        $this->app->bind('fmt_curr', function($app, $data) {
            return "$ " . number_format($data['value'], 2, ',', '.');
        });

        $this->app->bind('fmt_date', function($app, $data) {
            return $data['value']->format('d-m-Y');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
