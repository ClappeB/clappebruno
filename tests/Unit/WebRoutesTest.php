<?php

namespace Tests\Unit;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    private static $languagesToTest = array('fr','en');

    public function testWelcome(){
        $this->routeOkWithAllLocales('welcome');
    }

    public function testResume(){
        $this->routeOkWithAllLocales('resume');
    }

    public function testResumeDownload(){
        foreach(self::$languagesToTest as $language){
            $this->app->setLocale($language);
            $this->get(route('resume_download'))->assertStatus(500);
        }
    }

    public function testWork(){
        $this->routeOkWithAllLocales('work');
    }

    public function testContact(){
        $this->routeOkWithAllLocales('contact');
    }

    public function testLegals(){
        $this->routeOkWithAllLocales('legals');
    }

    private function routeOkWithAllLocales($routeName){
        foreach(self::$languagesToTest as $language){
            $this->app->setLocale($language);
            $this->get(route($routeName))->assertOk();
        }
    }

}
