<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\App;

class RoutesHelper
{
    public const LOCALE_SEPARATOR = '|';
    public const UNIVERSAL_ROUTES = ['welcome', 'contact', 'resume_download'];

    public static function isUniversalRoute(String $routeName){
        return in_array($routeName,self::UNIVERSAL_ROUTES);
    }

    public static function addLocaleToRoute(String $routeName, String $locale=null){
        if(self::isUniversalRoute($routeName)){
            return $routeName;
        }
        return ($locale==null) ? $routeName.self::LOCALE_SEPARATOR.App::getLocale() : $routeName.self::LOCALE_SEPARATOR.$locale;
    }

    public static function formatRouteForView(String $routeName){
        return (self::isUniversalRoute($routeName)) ? $routeName : ($routeName.self::LOCALE_SEPARATOR."'.\Illuminate\Support\Facades\App::getLocale().'");
    }

    public static function formatRouteForController(String $routeName){
        return (self::isUniversalRoute($routeName)) ? $routeName : ($routeName.self::LOCALE_SEPARATOR.\Illuminate\Support\Facades\App::getLocale());
    }

}
