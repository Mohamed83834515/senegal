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
use App\Models\Programmation\PTBACout;
use App\Models\Programmation\TypeActivite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PTBACoutController extends Controller
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
        $type_tache = new PTBACout();
        $type_tache->bailleur_pc = $request->bailleur;
        $type_tache->montant_pc = $request->couts;
        $type_tache->activite_pc = $request->type_activite;
        $type_tache->enregistrer_par_pc = Auth::user()->id;
        
        $type_tache->save();
        Flashy::success("Cout ajoutée avec succès");
        return redirect()->back();
    }

  
    public function edit($ids)
    {
        $tache=PTBACout::find($ids);
        return response()->json([
        'satuts'=>2000,
        'taches'=>$tache,
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
        $type_tache = PTBACout::find($id);
        $type_tache->bailleur_pc = $request->bailleur;
        $type_tache->montant_pc = $request->couts;
        $type_tache->activite_pc = $request->type_activite;
        $type_tache->modifier_par_pc = Auth::user()->id;
    
        $type_tache->update();

        Flashy::success("Coût modifié avec succès");
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
        $type = PTBACout::find($id);
        $type->geler_pc= 1;
        $type->update();

        Flashy::success("Coût supprimé avec succès");
        //return redirect()->route('type_activite.index');
        return redirect()->back();
    }
}
