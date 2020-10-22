<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\App;

class WorkHelper
{

    public static $workpages = [
        ['name'=>'retro_java_game', 'slug'=> ['en'=>'retro-java-game', 'fr'=>'jeu-retro-java'] ],
        ['name'=>'tron_game', 'slug'=> ['en'=>'tron-game', 'fr'=>'jeu-tron'] ],
        ['name'=>'personal_website', 'slug'=> ['en'=>'personal-website', 'fr'=>'site-personnel'] ],
        ['name'=>'roleplay_assistant', 'slug'=> ['en'=>'roleplay-game-assistant', 'fr'=>'assistant-jeu-de-role'] ],
        ['name'=>'student_office_website', 'slug'=> ['en'=>'student-office-website', 'fr'=>'site-internet-bureau-des-etudiants'] ],
        ['name'=>'network_A2', 'slug'=> ['en'=>'company-network', 'fr'=>'reseau-entreprise'] ],
        ['name'=>'solidarity_bond_website', 'slug'=> ['en'=>'covid-19-help-website', 'fr'=>'site-internet-anti-covid-19'] ]
    ];

    public static function format_path_for_work_images($parent_file, $file){
        return $parent_file.'/img/'.$file;
    }

    public static function format_path_for_work_download($file){
        return $file.'/download/'.$file.'.zip';
    }

    public static function retrieve_work_by_slug($slug){
        $works = __('work.work_pages');
        foreach (self::$workpages as $work){
            foreach ($work['slug'] as $slug_locale) {
                if ($slug_locale == $slug) {
                    return $works[$work['name']];
                }
            }
        }
        return back();
    }

}
