<?php

namespace App\Http\Controllers\Etat_Rapport;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Programmation\PTBA;
use App\Models\SuiviResultat\SuiviPTBA;
use App\Models\SuiviResultat\ObservationPTBA;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class RapportIndicateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.etat_rapport.rapport_indicateur.liste", [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $observation = new ObservationPTBA();

        $observation->executant_op = $request->executant_op;
        $observation->observation_op = $request->observation_op;
        $observation->id_ptba_op = $request->id_ptba_op;
        $observation->enregisrer_par_op = Auth::user()->id;
        
        $observation->save();


        
        Flashy::success("Observation ajoutée avec succès");

        return redirect()->back();
    }

  

  
    public function edit($id)
    {
        
        $observation=ObservationPTBA::find($id);
        return response()->json([
        'satuts'=>2000,
        'observation'=>$observation,
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
        $observation=ObservationPTBA::find($id);
        $observation->executant_op = $request->executant_op;
        $observation->observation_op = $request->observation_op;
        $observation->modifier_par_op = Auth::user()->id;
    
        $observation->update();

        Flashy::success("Observation modifiée avec succès");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $ptba = ObservationPTBA::find($id);
        $ptba->geler_op = 1;
        $ptba->update();

        Flashy::success("Observation supprimée avec succès");
        return redirect()->back();
    }
}
