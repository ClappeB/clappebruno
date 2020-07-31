<?php

namespace Tests\Unit;

use App\Http\Helpers\RoutesHelper;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    private static $languagesToTest = array('fr','en');

    private const VIEW_GENERAL = 'general';

    public function testWelcome(){
        $this->routeOkAndViewCorrectWithAllLocales('welcome', self::VIEW_GENERAL);
    }

    public function testResume(){
        $this->routeOkAndViewCorrectWithAllLocales('resume', self::VIEW_GENERAL);
    }

    public function testResumeDownload(){
        foreach(self::$languagesToTest as $language){
            $this->app->setLocale($language);
            $this->get(route(RoutesHelper::formatRouteForController('resume_download')))->assertStatus(500);
        }
    }

    public function testWork(){
        $this->routeOkAndViewCorrectWithAllLocales('work', self::VIEW_GENERAL);
    }

    public function testContact(){
        $this->routeOkAndViewCorrectWithAllLocales('contact', self::VIEW_GENERAL);
    }

    public function testLegals(){
        $this->routeOkAndViewCorrectWithAllLocales('legals', self::VIEW_GENERAL);
    }

    private function routeOkAndViewCorrectWithAllLocales(String $routeName, String $folder=null){
        $folder = ($folder==null) ? null : $folder.'.';
        foreach(self::$languagesToTest as $language){
            $this->app->setLocale($language);
            $this->get(route(RoutesHelper::formatRouteForController($routeName)))->assertOk()->assertViewIs($folder.$routeName);
        }
    }

}
