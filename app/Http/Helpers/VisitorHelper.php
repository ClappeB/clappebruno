<?php

namespace App\Http\Helpers;

use App\Http\Middleware\General\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class VisitorHelper
{

    private const COOKIE_OLDVISITOR_NAME = 'oldVisitor';
    private const COOKIE_CONSENT_NAME = 'cookiesConsent';
    private const REQUEST_COOKIE_CONSENT_NAME = 'consent';

    public static function isOldVisitor(){
        if(!self::isOldVisitorViaCookie()){
            if(!self::isOldVisitorViaSession()){
                return false;
            }
        }
        return true;
    }

    private static function isOldVisitorViaCookie(){
        return Cookie::has(self::COOKIE_OLDVISITOR_NAME);
    }

    private static function isOldVisitorViaSession(){
        return Session::has(self::COOKIE_OLDVISITOR_NAME);
    }

    public static function makeOldVisitor(){
        Session::put(self::COOKIE_OLDVISITOR_NAME, true);
        Cookie::queue(Cookie::make(self::COOKIE_OLDVISITOR_NAME, true, 60*24));
    }

    public static function makeNewVisitor(){
        Session::remove(self::COOKIE_OLDVISITOR_NAME);
        Cookie::queue(Cookie::forget(self::COOKIE_OLDVISITOR_NAME));
        Cookie::queue(Cookie::forget(self::COOKIE_CONSENT_NAME));
    }

    public static function deleteLocale(){
        Session::remove(Language::LANGUAGE_VARIABLE_NAME);
    }

    public static function hasConsentedToCookies(){
        return Cookie::has(self::COOKIE_CONSENT_NAME);
    }

    public static function consentToCookies(Request $request){
        if($request->has(self::REQUEST_COOKIE_CONSENT_NAME)){
            if($request->get(self::REQUEST_COOKIE_CONSENT_NAME)==true) {
                Cookie::queue(Cookie::make(self::COOKIE_CONSENT_NAME, true, 60 * 24 * 7));
            }
        }
    }

}
