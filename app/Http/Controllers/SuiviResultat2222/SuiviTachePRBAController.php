<?php

namespace App\Http\Controllers\SuiviResultat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\SuiviResultat\SuiviIndicateurPTBA;
use App\Models\Programmation\PTBA;
use App\Models\Programmation\PTBATache;
use App\Models\SuiviResultat\SuiviTachePTBA;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class SuiviTachePRBAController extends Controller
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
        $convention = new SuiviTachePTBA();
        $convention->id_tache_stp = $request->id_tache_stp;
        $convention->id_ptba_stp = $request->id_ptba_stp;
        $convention->proportion_stp = $request->proportion_stp;
        $convention->valide_stp = $request->valide_stp;
        $convention->projet_stp = 0;
        $convention->observation_stp = $request->observation_stp;
        $convention->enregisrer_par_stp = Auth::user()->id;
        $convention->save();
        Flashy::success("PTBA ajouté avec succès");

        return redirect()->route('suivi_ptba.index');
    }

    
   
    public function edit($ids)
    {
        
        $indicateur=SuiviTachePTBA::find($ids);
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
     public function update(Request $request, $ids)
    {
        $convention = SuiviTachePTBA::find($ids); 
dd($request->statut);
        // $convention->id_tache_stp = $request->id_tache_stp;
        // $convention->id_ptba_stp = $request->id_ptba_stp;
        // $convention->proportion_stp = $request->proportion_stp;
        $convention->valide_stp = $request->statut;
      //  $convention->projet_stp = 0;
        $convention->observation_stp = $request->observation;
        $convention->lot_stp = $request->lot;
        $convention->date_suivi_stp = $request->date_suivi;
        $convention->source_stp = $request->source;
    
        $convention->update();
        Flashy::success("Tâche suivi avec succès");
        return redirect()->route('suivi_ptba.index');
    } 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


 
}
