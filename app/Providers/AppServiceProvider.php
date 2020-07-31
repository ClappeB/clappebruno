<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use App\Http\Helpers\RoutesHelper;

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
            return (RoutesHelper::isUniversalRoute($routeName))? "route('$routeName')" : "route('".RoutesHelper::formatRouteForView($routeName)."')";
        });

        Blade::directive('RouteNameWithLocale', function(String $routeName){
            $routeName = str_replace("'", "", $routeName);
            return (RoutesHelper::isUniversalRoute($routeName))? ('"'.$routeName.'"') : ("'".RoutesHelper::formatRouteForView($routeName)."'");
        });

        Blade::directive('CurrentRouteName', function(){
            return '"'.Route::currentRouteName().'"';
        });

        Blade::if('RightLocale', function($locale){
            return $locale==App::getLocale();
        });

    }
}
