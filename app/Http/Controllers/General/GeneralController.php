<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class GeneralController extends Controller
{

    public function language(String $locale){
        $locale = in_array($locale, config('app.supported_locales')) ? $locale : config('app.fallback_locale');
        session()->put('locale', $locale);
        return back();
    }

    public function welcome() {
        return view('general.welcome');
    }

    public function resume() {
        return view('general.resume');
    }

    public function ResumeDownload() {
        $file_path = 'resources/resume/'.App::getLocale().'/'.__('resume.resume_name').'.pdf';
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

}
