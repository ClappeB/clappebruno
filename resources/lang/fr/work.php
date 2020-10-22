<?php

use \App\Http\Helpers\WorkHelper;

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
    | Traductions pour les réalisations & pages de réalisations
    |--------------------------------------------------------------------------
    |
    | Traductions pour les réalisations.
    |
    */

    'work_pages' => [
        //Retro Java Game
        $retro_game['name'] => [
            'name' => $retro_game['name'],
            'slug' => $retro_game['slug']['fr'],
            'title' => "Jeu retro 2D en Java (inspiré de Boulder Dash)",
            'description' => "Une réplique épurée d'un jeu 2D rétro, réalisé en équipe de quatre étudiants.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"concept.png"), 'alt' => "Le premier niveau du jeu, présentant le concept.",
                    'text' => "Vous devez récupérer les diamants pour pouvoir sortir, tout en évitant les créatures et les chutes d'objets."],
                'level' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"level.png"), 'alt' => "Un niveau du jeu.",
                    'text' => "Le jeu vous offre cinq niveaux différents que vous pouvez personnaliser afin de multiplier les challenges et de créer les vôtres."],
                'level_choosing' => ['img' => WorkHelper::format_path_for_work_images($retro_game['name'],"level_choosing.png"), 'alt' => "Le choix du niveau au lancement du jeu.",
                    'text' => "Un écran vous accueille en vous permettant de choisir simplement le niveau que vous souhaitez jouer."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($retro_game['name'])]
        ],
        //Tron game
        $tron_game['name'] => [
            'name' => $tron_game['name'],
            'slug'=> $tron_game['slug']['fr'],
            'title' => "Jeu compétitif en Java (inspiré de Tron)",
            'description' => "Un jeu compétitif et multijoueur réalisé en trois jours en Java.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"playing.png"), 'alt' => "Le concept du jeu avec deux joueurs s'affrontant.",
                    'text' => "Un jeu compétitif dans lequel vous devez être le dernier encore en vie."],
                'start' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"start.png"), 'alt' => "Le début du jeu.",
                    'text' => "À deux, démarrez chacun d'un côté du terrain et affrontez-vous jusqu'à ce que le meilleur gagne."],
                'winner' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"winner.png"), 'alt' => "L'affichage du gagnant.",
                    'text' => "Une fenêtre vous annonce le gagnant et vous permet de jouer le match revanche."],
                'many_players' => ['img' => WorkHelper::format_path_for_work_images($tron_game['name'],"many_players.png"), 'alt' => "Le jeu laissant s'affronter six joueurs.",
                    'text' => "Invitez jusqu'à sept autres personnes et déterminez de la même manière qui est le meilleur joueur."],
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
            'slug' => $roleplay_game_assistant['slug']['fr'],
            'title' => "Assistant de jeu de rôle",
            'description' => "Un assistant très léger pour du jeu de rôle sur table.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"deployed.png"), 'alt' => "L'interface de l'assistant, déployée.",
                    'text' => "Un assistant permettant une création de personnage rapide."],
                'character_creation_social' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_social.png"), 'alt' => "Interface de l'aspect social du personnage.",
                    'text' => "Des traits à choisir parmis des listes personnalisables et des informations parmis les plus récurrentes."],
                'character_creation_health' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_health.png"), 'alt' => "Interface de l'aspect de santé du personnage.",
                    'text' => "Une gestion de l'état de santé simple mais avec des possibilités de changement utiles cachant des design pattern prévus pour l'évolution."],
                'character_creation_characteristics' => ['img' => WorkHelper::format_path_for_work_images($roleplay_game_assistant['name'],"character_creation_characteristics.png"), 'alt' => "Interface de gestion des caractéristiques du personnage.",
                    'text' => "Une interface de création des caractéristiques simple avec une liste de caractéristiques personnalisable."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($roleplay_game_assistant['name'])]
        ],
        //Student Office Website
        $student_office_website['name'] => [
            'name' => $student_office_website['name'],
            'slug'=> $student_office_website['slug']['fr'],
            'title' => "Site internet du bureau des étudiants",
            'description' => "Le site internet d'un bureau des étudiants fictif, réalisé en équipe de quatre étudiants.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"welcome.jpg"), 'alt' => "Page d'accueil du site du bureau des étudiants.",
                    'text' => "Un site polyvalent pour une meilleure communication."],
                'shop' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"shop.jpg"), 'alt' => "Page boutique du site du bureau des étudiants.",
                    'text' => "Une page boutique présentant les trois meilleures ventes de la boutique ainsi qu'un espace répertoriant toutes les marchandises et des fonctionnalités de tri."],
                'shopping_cart' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"shopping_cart.jpg"), 'alt' => "Page panier du site du bureau des étudiants.",
                    'text' => "La possibilité d'obtenir un récapitulatif de sa commande, son total et de payer directement via un simple bouton."],
                'activities' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities.jpg"), 'alt' => "Page de présentation des activités du bureau des étudiants.",
                    'text' => "Une section \"Activités\" pour organiser la vie associative de l'école et la possibilité de les trier."],
                'activities_student' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities_student.jpg"), 'alt' => "Page de présentation des activités du bureau des étudiants, en étant connecté en tant qu'étudiant.",
                    'text' => "La même section \"Activités\" change lorsqu'un utilisateur se connecte, lui laissant la possibilité de s'inscrire."],
                'activities_student_office' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"activities_student_office.jpg"), 'alt' => "Page de présentation des activités du bureau des étudiants, en étant connecté en tant que bureau des étudiants.",
                    'text' => "La section \"Activités\" est encore modifiée lorsque l'utilisateur fait partie de l'administration du site."],
                'gallery' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"gallery.jpg"), 'alt' => "Page de présentation des photos de l'activité, en étant connecté en tant que bureau des étudiants.",
                    'text' => "Une galerie pour chaque activité est présente et permet aux inscrits de consulter les photographies faites lors de l'activité."],
                'comments' => ['img' => WorkHelper::format_path_for_work_images($student_office_website['name'],"comments.jpg"), 'alt' => "Page de commentaires pour chaque photo de l'activité, en étant connecté en tant que bureau des étudiants.",
                    'text' => "Une section commentaire permet de rapprocher les gens autour des photos de l'activité. Chaque message peut être invisibilisé ou supprimé individuellement."]
            ],
        ],
        //Company Network
        $company_network['name'] => [
            'name' => $company_network['name'],
            'slug' => $company_network['slug']['fr'],
            'title' => "Réseau d'entreprise",
            'description' => "La création d'un réseau d'une entreprise avec gestion de VLAN et autorisations par VLAN, pare-feu, routage et commutation.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"site_principal.jpg"), 'alt' => "Le réseau du site principal, dans son concept.",
                    'text' => "Le réseau d'une entreprise multi-sites."],
                'sp_bp' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_bp.jpg"), 'alt' => "Le réseau du bâtiment principal du site principal.",
                    'text' => "Un bâtiment principal présentant plusieurs étages, plusieurs services et les VLANs affiliés."],
                'sp_bo' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_bo.jpg"), 'alt' => "Le réseau du bâtiment Ouest du site principal.",
                    'text' => "Le bâtiment Ouest du site principal accueillant le service informatique disposant de davantage de droits réseau."],
                'sp_be' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_be.jpg"), 'alt' => "Le réseau du bâtiment Est du site principal.",
                    'text' => "Le bâtiment Est du site principal et sa configuration pensée pour embarquer une redondance réseau afin d'assurer une résilience à la panne."],
                'sp_si' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"sp_si.jpg"), 'alt' => "Le réseau de la salle informatique du site principal.",
                    'text' => "La salle informatique du bâtiment principal centralise les connexions des trois précédents bâtiments et rend disponible le serveur DHCP et FTP."],
                'agence' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"agence.jpg"), 'alt' => "Le réseau de l'agence de l'entreprise.",
                    'text' => "L'agence de proximité de l'entreprise, moins critique, est aussi reliée au reste du réseau, en accueillant moins de redondance."],
                'datacenter' => ['img' => WorkHelper::format_path_for_work_images($company_network['name'],"datacenter.jpg"), 'alt' => "Le réseau du datacenter de l'entreprise.",
                    'text' => "Le datacenter de l'entreprise centralise le trafic réseau et offre l'accès à divers serveurs ainsi qu'à internet via un pare-feu à état permettant l'implémentation d'une zone démilitarisée simple."],
            ],
            'download' => ['link' => WorkHelper::format_path_for_work_download($company_network['name'])]
        ],
        //Solidarity bond website
        $solidarity_bond_website['name'] => [
            'name' => $solidarity_bond_website['name'],
            'slug' => $solidarity_bond_website['slug']['fr'],
            'title' => "Site internet d'aide anti-Covid-19",
            'description' => "Un site internet pour l'intégration de notre école à la lutte anti-Covid-19, réalisé en équipe de trois étudiants.",
            'images' => [
                'overview' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"welcome.png"), 'alt' => "Page d'accueil du site internet d'aide anti-Covid-19.",
                    'text' => "Site internet de commande de vitre de protection pour les entreprises."],
                'shop' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"shop.png"), 'alt' => "Page boutique du site d'aide anti-Covid-19.",
                    'text' => "Une page boutique épurée présentant les diverses pièces pensées et modélisées par nos soins."],
                'shopping_cart' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"shopping_cart.png"), 'alt' => "Page panier du site d'aide anti-Covid-19.",
                    'text' => "Un récapitulatif de la commande simple afin de s'assurer de la commande à passer."],
                'orders' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"orders.png"), 'alt' => "Page de gestion des commandes pour le fablab manager.",
                    'text' => "Une page récapitulant les commandes à réaliser, uniquement accessible par le technicien en charge des confections."],
                'profil' => ['img' => WorkHelper::format_path_for_work_images($solidarity_bond_website['name'],"profile.png"), 'alt' => "Page de profil pour chaque utilisateur.",
                    'text' => "La page profil permettant à chacun de visualiser les commandes en cours et précédemment réalisées ainsi que modifier ses informations personnelles, en accord avec le RGPD."],
            ]
        ]
    ],

    'download' => "Cliquez pour télécharger cette réalisation."

];
