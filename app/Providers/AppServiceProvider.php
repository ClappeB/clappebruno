<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;

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

        Blade::if('NotDesktop', function(){
            $agent = new Agent();
            return ($agent->isMobile() || $agent->isTablet());
        });

        Blade::if('Desktop', function(){
            $agent = new Agent();
            return $agent->isDesktop();
        });

        Carbon::setLocale(App::getLocale());

    }
}
