<?php

namespace App\Http\Controllers\SuiviResultat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Programmation\ConventionResultat;
use App\Models\Programmation\PTBA;
use App\Models\Programmation\TypeActivite;
use App\Models\SuiviResultat\SuiviPTBA;
use App\Models\User;
use App\Models\SuiviResultat\SuiviIndicateurPTBA;
use App\Models\CadreResultat\IndicateurCS;
use App\Models\Parametrages\UniteIndicateur;
use App\Models\Programmation\PTBACout;
use App\Models\Programmation\PTBAIndicateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class SuiviIndicateurPRBAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convention = new SuiviIndicateurPTBA();
        $convention->id_indicateur_sip = $request->id_indicateur;
        $convention->lieu_sip = $request->lieu;
        $convention->ugel_sip = 0;
        $convention->date_suivi_sip = $request->date_suivi_ind;
        $convention->valeur_suivi_sip = $request->valeur;
        $convention->id_activite_sip = $request->id_activite;
        $convention->enregisrer_par_sip = Auth::user()->id;
        $convention->save();
        Flashy::success("PTBA ajouté avec succès");
        return redirect()->back();
        //return redirect()->route('suivi_ptba.index');
    }

   

    public function show( $id)
    {
       
    }
 

    
 

    public function edit($id)
    {
        
        $indicateur=SuiviIndicateurPTBA::find($id);
        return response()->json([
        'satuts'=>2000,
        'indicateur'=>$indicateur,
        ]);
      
        
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $convention=SuiviIndicateurPTBA::find($id);
        $convention->lieu_sip = $request->lieu;
        $convention->ugel_sip = 0;
        $convention->date_suivi_sip = $request->date_suivi_ind;
        $convention->valeur_suivi_sip = $request->valeur;
        $convention->modifier_par_sip = Auth::user()->id;
        $convention->update();
        Flashy::success("Suivi Indicateur PTBA modifié avec succès");
        return redirect()->back();
       // return redirect()->route('suivi_ptba.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function  destroy(Request $request, $id)
    {
        $ptba = SuiviIndicateurPTBA::find($id);
        $ptba->geler_sip = 1;
        $ptba->update();

        Flashy::success("Suivi Indicateur PTBAT supprimé avec succès");
        return redirect()->back();
       // return redirect()->route('suivi_ptba.index');
    }
}
