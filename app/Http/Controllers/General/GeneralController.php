<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Helpers\VisitorHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\RoutesHelper;

class GeneralController extends Controller
{

    public function language(String $newLocale){
        $newLocale = in_array($newLocale, config('app.supported_locales')) ? $newLocale : config('app.fallback_locale');
        $this->setAllLocales($newLocale);

        $previousRoute = (request()->ajax()) ? $this->retrieveRouteName(request('previousRoute')): request('previousRoute');

        $route_exploded = explode(RoutesHelper::LOCALE_SEPARATOR, $previousRoute);

        if(count($route_exploded)==1){
            return (request()->ajax()) ? back()->getTargetUrl() : back();
        } else {
            return (request()->ajax()) ? \route($route_exploded[0].RoutesHelper::LOCALE_SEPARATOR.$newLocale)
                : redirect(\route($route_exploded[0].RoutesHelper::LOCALE_SEPARATOR.$newLocale));
        }

    }

    public function welcome() {
        return view('general.welcome');
    }

    public function resume() {
        return view('general.resume');
    }

    public function resumeDownload() {
        $file_path = public_path('resources/resume/'.App::getLocale().'/'.__('resume.resume_name').'.pdf');
        return response()->download($file_path);
    }

    public function work() {
        return view('general.work');
    }

    public function contact() {
        return view('general.contact');
    }

    public function legals() {
        return view('general.legals');
    }

    public function cookies(){
        VisitorHelper::consentToCookies(request());
    }

    private function setAllLocales($newLocale){
        session()->put('locale', $newLocale);
        App::setLocale($newLocale);
        Carbon::setLocale($newLocale);
        setlocale(LC_TIME, App::getLocale() ? $newLocale : config('app.locale'));
    }

    private function retrieveRouteName($RouteURL){
        $routeName = collect(Route::getRoutes())->first(function($route) use ($RouteURL){
            return $route->matches(request()->create($RouteURL));
        });
        return $routeName->getName();
    }

}
