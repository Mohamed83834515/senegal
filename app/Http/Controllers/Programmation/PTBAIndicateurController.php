<?php

namespace App\Http\Controllers\Programmation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\TypeProgramme;
use App\Models\Programmation\Convention;
use App\Models\Programmation\PTBAIndicateur;
use App\Models\Programmation\TypeActivite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PTBAIndicateurController extends Controller
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
        $type_tache = new PTBAIndicateur();
        $type_tache->code_pi = $request->code;
        $type_tache->activite_ptba_pi = $request->type_activite;
        $type_tache->indicateur_produit_pi = $request->indicateurpcga;
        $type_tache->intitule_pi = $request->intitule;
        $type_tache->unite_pi = $request->unite;
        $type_tache->valeur_cible_pi = $request->valeur_cible;
        $type_tache->enregistrer_par_pi = Auth::user()->id;
        
        $type_tache->save();
        Flashy::success("Indicateur ajouté avec succès");
        return redirect()->back();
    }

    public function edit($ids)
    {
        $tache=PTBAIndicateur::find($ids);
        return response()->json([
        'satuts'=>2000,
        'tache'=>$tache,
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
        $type_tache = PTBAIndicateur::find($id);
        $type_tache->code_pi = $request->code;
        $type_tache->activite_ptba_pi = $request->type_activite;
        $type_tache->indicateur_produit_pi = $request->indicateurpcga;
        $type_tache->intitule_pi = $request->intitule;
        $type_tache->unite_pi = $request->unite;
        $type_tache->valeur_cible_pi = $request->valeur_cible;
        $type_tache->modifier_par_pi = Auth::user()->id;
    
        $type_tache->update();

        Flashy::success("Indicateur modifié avec succès");
        return redirect()->back();
        //return redirect()->route('programme.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $type = PTBAIndicateur::find($id);
        $type->geler_pi= 1;
        $type->update();

        Flashy::success("Indicateur supprimé avec succès");
        return redirect()->back();
    }
}
