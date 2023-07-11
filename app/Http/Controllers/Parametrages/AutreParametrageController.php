<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Fonction;
use App\Models\Parametrages\CategorieDepense;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\UniteIndicateur;
use App\Models\Parametrages\Thematique;
use App\Models\Parametrages\TypePartenaire;
use App\Models\Parametrages\TypeProgramme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy; 

class AutreParametrageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view("dashboard.parametrage.autres.liste", [
            "fonctions" => fonction::where('geler_fnct', '=', 0)->get(),
            "autres"=> Partenaire::where('geler_pat','=',0)->get(),
            "categories" => CategorieDepense::where('geler_cat', '=', 0)->get(),
            "unites" => UniteIndicateur::where('geler_uti', '=', 0)->get(),
            "thematiques" => Thematique::where('geler_tmq', '=', 0)->get(),
            "types" => TypePartenaire::where('geler_tpt', '=', 0)->get(),
            "type_programmes" => TypeProgramme::where('geler_tpr', '=', 0)->get(),
        ]);
    }

   
}
