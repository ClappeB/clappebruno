<?php

namespace App\Http\Middleware\General;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Language
{

    public const LANGUAGE_VARIABLE_NAME = 'locale';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has(self::LANGUAGE_VARIABLE_NAME)){
            session()->put(self::LANGUAGE_VARIABLE_NAME, $request->getPreferredLanguage(config('app.supported_locales')));
        }
        $locale = session()->get(self::LANGUAGE_VARIABLE_NAME);
        App::setLocale($locale);
        Carbon::setLocale($locale);
        setlocale(LC_TIME, App::getLocale() ? $locale : config('app.locale'));
        return $next($request);
    }
}
