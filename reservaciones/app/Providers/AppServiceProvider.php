<?php

namespace App\Providers;

use App\RoomType;
use Illuminate\Support\Facades\View;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [ 'index', 'hotel.confirm' ],
            function ($view)
            {
                $roomTypes = RoomType::all();
                $view->with('roomTypes', $roomTypes);
            }
        );
    }
}
