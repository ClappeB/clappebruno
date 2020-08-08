<?php

namespace App\Providers;

use App\Http\Helpers\VisitorHelper;
use App\View\Components\test\cleanButton;
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

        Blade::if('IsFirstVisit', function(){
           return !VisitorHelper::isOldVisitor();
        });

        Blade::if('FirstVisit', function(){
            if(!VisitorHelper::isOldVisitor()){
                VisitorHelper::makeOldVisitor();
                return true;
            }
            return false;
        });

        Blade::if('debug', function(){
            return config('app.debug');
        });

        Blade::if('CookiesConsent', function(){
            return !VisitorHelper::hasConsentedToCookies();
        });

    }
}
