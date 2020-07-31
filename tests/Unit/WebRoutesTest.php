<?php

namespace Tests\Unit;

use App\Http\Helpers\RoutesHelper;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    private static $languagesToTest = array('fr','en');

    private const VIEW_GENERAL_FOLDER = 'general.';

    public function testWelcome(){
        $this->routeOkAndViewCorrectWithAllLocales('welcome', self::VIEW_GENERAL_FOLDER.'welcome');
    }

    public function testResume(){
        $this->routeOkAndViewCorrectWithAllLocales('resume', self::VIEW_GENERAL_FOLDER.'resume');
    }

    public function testResumeDownload(){
        $this->routeOkAndViewCorrectWithAllLocales('resume_download');
    }

    public function testWork(){
        $this->routeOkAndViewCorrectWithAllLocales('work', self::VIEW_GENERAL_FOLDER.'work');
    }

    public function testContact(){
        $this->routeOkAndViewCorrectWithAllLocales('contact', self::VIEW_GENERAL_FOLDER.'contact');
    }

    public function testLegals(){
        $this->routeOkAndViewCorrectWithAllLocales('legals', self::VIEW_GENERAL_FOLDER.'legals');
    }

    public function testLanguages(){
        foreach(self::$languagesToTest as $locale) {
            foreach(self::$languagesToTest as $language) {
                $this->app->setLocale($locale);
                $this->put(route(RoutesHelper::formatRouteForController('language'), $language));
                $this->assertEquals($language, $this->app->getLocale());
            }
        }
    }

    private function routeOkAndViewCorrectWithAllLocales(String $routeName, String $view=null){
        if($view!=null) {
            foreach (self::$languagesToTest as $language) {
                $this->app->setLocale($language);
                $this->get(route(RoutesHelper::formatRouteForController($routeName)))->assertSuccessful()->assertViewIs($view);
            }
        } else {
            foreach (self::$languagesToTest as $language) {
                $this->app->setLocale($language);
                $this->get(route(RoutesHelper::formatRouteForController($routeName)))->assertSuccessful();
            }
        }
    }

}
