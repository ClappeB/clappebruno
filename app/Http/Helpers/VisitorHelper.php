<?php

namespace App\Http\Helpers;

use App\Http\Middleware\General\Language;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class VisitorHelper
{

    private const COOKIE_VALUE_NAME = 'oldVisitor';

    public static function isOldVisitor(){
        if(!self::isOldVisitorViaCookie()){
            if(!self::isOldVisitorViaSession()){
                return false;
            }
        }
        return true;
    }

    private static function isOldVisitorViaCookie(){
        return Cookie::has(self::COOKIE_VALUE_NAME);
    }

    private static function isOldVisitorViaSession(){
        return Session::has(self::COOKIE_VALUE_NAME);
    }

    public static function makeOldVisitor(){
        Session::put(self::COOKIE_VALUE_NAME, true);
        Cookie::queue(Cookie::make(self::COOKIE_VALUE_NAME, true, 60*24));
    }

    public static function makeNewVisitor(){
        Session::remove(self::COOKIE_VALUE_NAME);
        Cookie::queue(Cookie::forget(self::COOKIE_VALUE_NAME));
    }

    public static function deleteLocale(){
        Session::remove(Language::LANGUAGE_VARIABLE_NAME);
    }

}
