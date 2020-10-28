<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Helpers\VisitorHelper;
use App\Http\Helpers\WorkHelper;
use App\Mail\ContactMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Helpers\RoutesHelper;
use Illuminate\Http\Request;

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
            if($route_exploded[0]=="work_page"){
                $newRoute = $route_exploded[0].RoutesHelper::LOCALE_SEPARATOR.App::getLocale();
                $previous_url_exploded = explode('/', back()->getTargetUrl());
                $previous_url_exploded[4] = explode('?', $previous_url_exploded[4])[0];
                return (request()->ajax()) ? \route($newRoute, ['slug'=>WorkHelper::retrieve_work_by_slug($previous_url_exploded[4])['slug']])
                    : redirect(\route($newRoute, ['slug'=>WorkHelper::retrieve_work_by_slug($previous_url_exploded[4])['slug']]));
            }
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

    public function mail_contact(Request $request){
        $request->validate([
            'email' => 'required|regex:/^\w+@\w+\.\w+$/',
            'object' => 'required|max:255',
            'message' => 'required|max:3000'
        ]);
        Mail::to(config('mail.mailers.smtp.username'))->send(new ContactMail($request->all()));
        return back()->with('mail_sent', "");
    }

    public function legals() {
        return view('general.legals');
    }

    public function work_page($slug){
        $work = WorkHelper::retrieve_work_by_slug($slug);
        if(!is_array($work)){return back();}
        return view('general.work_page', compact("work"));
    }

    public function work_download(){
        $key = request()['work_name'];
        $works = __('work.work_pages');
        if(!key_exists($key, $works) || !key_exists('download', $works[$key])){return back();}
        $work = $works[$key];
        $file_path = public_path('resources/work/'.$work['download']['link']);
        if(!file_exists($file_path)){return back();}
        $name = str_replace('-', '_', $work['slug']).".zip";
        return response()->download($file_path, $name);
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
