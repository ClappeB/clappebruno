<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use App\Http\Controllers\General\GeneralController;

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

        Blade::directive('RouteWithLocale', function(String $routeName){
            $routeName = str_replace("'", "", $routeName);
            return (GeneralController::isUniversalRoute($routeName))? "route('$routeName')" : "route('".$routeName.GeneralController::LOCALE_SEPARATOR."'.\Illuminate\Support\Facades\App::getLocale())";
        });

        Blade::directive('RouteNameWithLocale', function(String $routeName){
            $routeName = str_replace("'", "", $routeName);
            return (GeneralController::isUniversalRoute($routeName))? ('"'.$routeName.'"') : ("'".$routeName.GeneralController::LOCALE_SEPARATOR."'.\Illuminate\Support\Facades\App::getLocale()");
        });

        Blade::directive('CurrentRouteName', function(){
            return '"'.Route::currentRouteName().'"';
        });

        Blade::if('RightLocale', function($locale){
            return $locale==App::getLocale();
        });

    }
}
