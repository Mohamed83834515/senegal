<?php

namespace App\Http\Controllers\SuiviResultat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\SuiviResultat\SuiviIndicateurPP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class SuiviIndicateurPPController extends Controller
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
        $convention = new SuiviIndicateurPP();
        $convention->id_indicateur_pp = $request->id_indicateur;
        $convention->lieu_pp = $request->lieu;
        $convention->ugel_pp = 0;
        $convention->observation_pp = $request->observation_op;
        $convention->annee_pp = $request->annee_ind;
        $convention->date_suivi_pp = $request->date_suivi_ind;
        $convention->valeur_suivi_pp = $request->valeur;
        if($request->pro_projet=="projet"){
            $convention->id_projet_pp = session('id_projet');
        }else{
        $convention->id_programme_pp = session('id_programme');

        }
        
        $convention->enregisrer_par_pp = Auth::user()->id;
        $convention->save();
        Flashy::success("Suivi ajouté avec succès");
        return redirect()->back();
        //return redirect()->route('suivi_ptba.index');
    }

   

    public function show( $id)
    {
       
    }
 

    
 

    public function edit($id)
    {
        
        $indicateur=SuiviIndicateurPP::find($id);
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
        $convention=SuiviIndicateurPP::find($id);
        $convention->lieu_pp = $request->lieu;
        $convention->observation_pp = $request->observation_op;
        $convention->annee_pp = $request->annee_ind;
        $convention->date_suivi_pp = $request->date_suivi_ind;
        $convention->valeur_suivi_pp = $request->valeur;
        $convention->modifier_par_pp = Auth::user()->id;
        $convention->update();
        Flashy::success("Suivi Indicateur modifié avec succès");
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
        
        $ptba = SuiviIndicateurPP::find($id);
        $ptba->geler_pp = 1;
        $ptba->update();

        Flashy::success("Suivi Indicateur supprimé avec succès");
        return redirect()->back();
       // return redirect()->route('suivi_ptba.index');
    }
}
