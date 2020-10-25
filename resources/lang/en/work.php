<?php

use App\Http\Helpers\WorkHelper;

$retro_game = WorkHelper::$workpages[0];
$tron_game = WorkHelper::$workpages[1];
//$personal_website = WorkHelper::$workpages[2];
$roleplay_game_assistant = WorkHelper::$workpages[3];
$student_office_website = WorkHelper::$workpages[4];
$company_network = WorkHelper::$workpages[5];
$solidarity_bond_website = WorkHelper::$workpages[6];

return [

    /*
    |--------------------------------------------------------------------------
    | Work & work pages translations
    |--------------------------------------------------------------------------
    |
    | Translations for work pages.
    |
    */

    'work_pages' => [

        //Retro Java Game
        $retro_game['name'] => [
            'name' => $retro_game['name'],
            'slug' => $retro_game['slug']['en'],
            'title' => "2D retro Java game (inspired by Boulder Dash)",
            'description' => "A lightweight replica of a 2D retro game, made in team of four students.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"concept.png"), 'alt' => "The first level of the game, presenting the concept.",
                    'text' => "You have to pick up the diamonds to get out, while escaping from creatures and rocks."],
                'level' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"level.png"), 'alt' => "A level of the game.",
                    'text' => "You have five different levels, fully customisable to offer more challenges and create yours."],
                'level_choosing' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"level_choosing.png"), 'alt' => "Level choosing at game launching.",
                    'text' => "You can easily choose the level you want to play at game launching."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($retro_game['name'])]
        ],
        //Tron game
        $tron_game['name'] => [
            'name' => $tron_game['name'],
            'slug'=> $tron_game['slug']['en'],
            'title' => "Competitive Java game (inspired from Tron)",
            'description' => "A competitive and multiplayer game, made in Java within three days.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"playing.png"), 'alt' => "Game concept, presenting two players confronting.",
                    'text' => ""],
                'start' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"start.png"), 'alt' => "Game starting.",
                    'text' => "Two players, start on each side of the arena and confront until best wins."],
                'winner' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"winner.png"), 'alt' => "Winner announcing.",
                    'text' => "A window announces the winner and allows you to rematch."],
                'many_players' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"many_players.png"), 'alt' => "A game with six different players.",
                    'text' => "Invite up to seven other players and fight each other to determine the best player."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($tron_game['name'])]
        ],/*
            'personal_website' => [
                'title' => "Site internet personnel",
                'description' => "Le site que vous visitez actuellement.",
                'images' => [
                    'overview' => ['img' => format_path($workpages_fr[3],"deployed.png"), 'alt' => "L'interface de l'assistant, déployé."],
                    'character_creation_social' => ['img' => format_path($workpages_fr[3],"character_creation_social.png"), 'alt' => "Page boutique du site d'aide anti-Covid-19."],
                    'character_creation_health' => ['img' => format_path($workpages_fr[3],"character_creation_health.png"), 'alt' => "Page panier du site d'aide anti-Covid-19."],
                    'character_creation_characteristics' => ['img' => format_path($workpages_fr[3],"character_creation_characteristics.png"), 'alt' => "Page de gestion des commandes pour le fablab manager."],
                ]
            ],*/
        //Roleplay game assistant
        $roleplay_game_assistant['name'] => [
            'name' => $roleplay_game_assistant['name'],
            'slug' => $roleplay_game_assistant['slug']['en'],
            'title' => "Roleplay game assistant",
            'description' => "A lightweight assistant for roleplay game.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"deployed.png"), 'alt' => "The deployed user interface.",
                    'text' => "A lightweight assistant which permits a fast character's creation."],
                'character_creation_social' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_social.png"), 'alt' => "Interface for the character's social aspect.",
                    'text' => "Characteristics to choose in customisable lists and most commons information."],
                'character_creation_health' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_health.png"), 'alt' => "Interface for the character's health aspect.",
                    'text' => "Simple health management with useful changing possibilities which hide design patterns implemented for code evolution and flexibility."],
                'character_creation_characteristics' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_characteristics.png"), 'alt' => "Interface for the character's characteristics management.",
                    'text' => "Simple traits creation's interface including a customisable characteristics' list."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($roleplay_game_assistant['name'])]
        ],
        //Student Office Website
        $student_office_website['name'] => [
            'name' => $student_office_website['name'],
            'slug'=> $student_office_website['slug']['en'],
            'title' => "Student Office's website",
            'description' => "Fake student office's website, made in team of four students.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"welcome.jpg"), 'alt' => "Student office's website's welcome page.",
                    'text' => "A multipurpose site for a better communication."],
                'shop' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"shop.jpg"), 'alt' => "Student office's website's shop page.",
                    'text' => "A shop page, presenting the three best sales as well as a dedicated space to find all the products and sorting functionalities."],
                'shopping_cart' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"shopping_cart.jpg"), 'alt' => "Student office's website's shopping cart page.",
                    'text' => "A summary of your order and the prices' sum you can pay with Paypal by a simple click on the button."],
                'activities' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities.jpg"), 'alt' => "Student office's website's activities presentation page.",
                    'text' => "An \"Activity\" section to organise the school's community projects and a sorting possibility."],
                'activities_student' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities_student.jpg"), 'alt' => "Student office's website's activities presentation page, when logged in as normal student.",
                    'text' => "The same \"Activity\" section when logged in as a simple student, letting him/her the possibility to sign up to an activity."],
                'activities_student_office' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities_student_office.jpg"), 'alt' => "Student office's website's activities presentation page, when logged in as student office's member.",
                    'text' => "La section \"Activités\" est encore modifiée lorsque l'utilisateur fait partie de l'administration du site."],
                'gallery' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"gallery.jpg"), 'alt' => "Activity's photos' presentation's page, when logged in as student office's member.",
                    'text' => "A gallery for each activity permits activity's members to consult the pictures took during the event."],
                'comments' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"comments.jpg"), 'alt' => "Comments page for each activity's photo, while logged in as student office's member.",
                    'text' => "A comments section make people able to discuss about activities' photos. Each message can be switched to invisible or deleted in case it doesn't respect the rules."]
            ],
        ],
        //Company Network
        $company_network['name'] => [
            'name' => $company_network['name'],
            'slug' => $company_network['slug']['en'],
            'title' => "Company network",
            'description' => "Creation of a company network with VLAN and per-VLAN authorization, firewall, routing and switching.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"site_principal.jpg"), 'alt' => "Main site network, in its concept.",
                    'text' => "The network of a many-sites company, simulated with Cisco Packet Tracer."],
                'sp_bp' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_bp.jpg"), 'alt' => "Main site's main building's network.",
                    'text' => "A main building with three floors, many services and the affiliated VLANs."],
                'sp_bo' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_bo.jpg"), 'alt' => "Main site's West building's network.",
                    'text' => "The main site's west building hosting the IT service which has more network privileges."],
                'sp_be' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_be.jpg"), 'alt' => "Main site's East building's network.",
                    'text' => "The main site's east building's configuration has been thought to present a network redundancy for failure resiliency."],
                'sp_si' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_si.jpg"), 'alt' => "Main site's IT room's network.",
                    'text' => "The main site's IT room centralises the three previous building's connections and exposes a DHCP and a FTP server."],
                'agence' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"agence.jpg"), 'alt' => "Company's agency network.",
                    'text' => "The company's agency, with a less critical network, is linked to the company network but has no redundancy."],
                'datacenter' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"datacenter.jpg"), 'alt' => "Company's datacenter's network.",
                    'text' => "The company's datacenter centralises the network traffic and offers an access to some servers as well as internet through a stateful firewall implementing a simple demilitarized zone."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($company_network['name'])]
        ],
        //Solidarity bond website
        $solidarity_bond_website['name'] => [
            'name' => $solidarity_bond_website['name'],
            'slug' => $solidarity_bond_website['slug']['en'],
            'title' => "Covid-19 help website",
            'description' => "A website to incorporate our school in the fight against Covid-19, made in team of three students.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"welcome.png"), 'alt' => "Welcome page of the anti-Covid-19's site.",
                    'text' => "Plexiglass pane's ordering website for companies."],
                'shop' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"shop.png"), 'alt' => "Shop page of the site.",
                    'text' => "A straightforward shop page exposing the different product pieces designed by our team."],
                'shopping_cart' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"shopping_cart.png"), 'alt' => "Shopping cart page.",
                    'text' => "A simple order summary before validating to be sure the order is right."],
                'orders' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"orders.png"), 'alt' => "Orders management page for the fablab manager.",
                    'text' => "Only accessible for the fablab manager who crafts the products, this page summarizes all the orders."],
                'profil' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"profile.png"), 'alt' => "Profile page for users.",
                    'text' => "The profile page allows each logged in visitor to see the orders being prepared and the orders done as well as modify his personal information."],
            ]
        ],
    ],

    'download' => 'Click to download this work.'

];
