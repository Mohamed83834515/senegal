<?php

use Illuminate\Support\Facades\Date;

    if(! function_exists('page_title'))
    {
        function page_title($title)
        {
            $base_title = 'Reveil GeStock';

            if($title === '')
            {
                return $base_title ;
            }else {
                return $title .' - ' .$base_title;
            }
        }
    }

    if(! function_exists('check_module_selected'))
    {
        function check_module_selected($array, int $module_id)
        {
            if ($array == null) {
                return false;
            }
            
            foreach ($array as $value) {
                if ($value == $module_id) {
                    return true;
                }
            }
            return false;
        }

        function check_partenanire_selected($array,  $module_id)
        {
            if ($array == null) {
                return false;
            }
            
            foreach ($array as $value) {
                if ($value == $module_id) {
                    return true;
                }
            }
            return false;
        }
    }


    if(! function_exists('get_sous_module'))
    {
        function get_sous_module($array, int $module_parent_id)
        {   
            $sous_modules = [];
            foreach ($array as $value) {
                if ($value->idsmo != null && $value->idsmo == $module_parent_id) {
                    array_push($sous_modules, $value);
                }
            }
            return $sous_modules;
        }
    }

    if(! function_exists('get_concat_text'))
    {
        function get_concat_text($start='', $middle='', $end='')
        {   
            return "$start$middle$end";
        }
    }

    if(! function_exists('get_international_content'))
    {
        function get_international_content($french, $english)
        {   
            // Valeur par defaut au cas où l'une des langues est vide
            if (!$french) {
                return $english;
            }else if(!$english){
                return $french;
            }

            // Renvoi du contenu approprié
            if (app()->getLocale() == 'fr'){
                return $french;
            }else if(app()->getLocale() == 'en'){
                return $english;
            }
        }
    }
    
    if(! function_exists('get_liste_annee'))
    {
        function get_liste_annee()
        {   
            $annees = [];

            $currentYear = intval(date("Y"));

            for ($i= $currentYear; $i > $currentYear-30; $i--) { 
                array_push($annees, $i);
            }

            return $annees;
        }
    }

    if(! function_exists('get_liste_mois'))
    {
        function get_liste_mois()
        {   
            $mois = [
                ["id" => 1, "libelle" => "Janvier"],
                ["id" => 2, "libelle" => "Fevrier"],
                ["id" => 3, "libelle" => "Mars"],
                ["id" => 4, "libelle" => "Avril"],
                ["id" => 5, "libelle" => "Mai"],
                ["id" => 6, "libelle" => "Juin"],
                ["id" => 7, "libelle" => "Juillet"],
                ["id" => 8, "libelle" => "Août"],
                ["id" => 9, "libelle" => "Septembre"],
                ["id" => 10, "libelle" => "Octobre"],
                ["id" => 11, "libelle" => "Novembre"],
                ["id" => 12, "libelle" => "Decembre"],
            ];

            return $mois;
        }
    }

    if(! function_exists('get_liste_semaine'))
    {
        function get_liste_semaine()
        {   
            $semaines = [];

            for ($i=1; $i < 53; $i++) { 
                array_push($semaines, $i);
            }

            return $semaines;
        }
    }
