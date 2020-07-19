<?php

namespace Tests\Unit;

use Tests\TestCase;

class WebRoutesTest extends TestCase
{
    public function testWelcome(){
        $this->get(route('welcome'))->assertOk();
    }

    public function testResume(){
        $this->get(route('resume'))->assertOk();
    }

    public function testResumeDownload(){
        $this->get(route('resume_download'))->assertRedirect();
    }

    public function testWork(){
        $this->get(route('work'))->assertOk();
    }

    public function testContact(){
        $this->get(route('contact'))->assertOk();
    }

    public function testLegals(){
        $this->get(route('legals'))->assertOk();
    }

}
