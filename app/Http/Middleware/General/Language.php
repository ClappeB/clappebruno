<?php

namespace App\Http\Middleware\General;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('locale')){
            session()->put('locale', $request->getPreferredLanguage(config('app.supported_locales')));
        }
        $locale = session()->get('locale');
        App::setLocale($locale);
        Carbon::setLocale($locale);
        setlocale(LC_TIME, App::getLocale() ? $locale : config('app.locale'));
        return $next($request);
    }
}
