<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\RoutesHelper;

class GeneralController extends Controller
{

    public function language(String $newLocale){
        $newLocale = in_array($newLocale, config('app.supported_locales')) ? $newLocale : config('app.fallback_locale');
        $this->setAllLocales($newLocale);
        $route_exploded = explode(RoutesHelper::LOCALE_SEPARATOR, request('previousRoute'));

        if(count($route_exploded)==1){
            return back();
        } else {
            return redirect(\route($route_exploded[0].RoutesHelper::LOCALE_SEPARATOR.$newLocale));
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

    private function setAllLocales($newLocale){
        session()->put('locale', $newLocale);
        App::setLocale($newLocale);
        Carbon::setLocale($newLocale);
        setlocale(LC_TIME, App::getLocale() ? $newLocale : config('app.locale'));
    }

}
