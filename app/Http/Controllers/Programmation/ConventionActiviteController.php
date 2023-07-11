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
use App\Models\Programmation\ConventionActivite;
use App\Models\Programmation\ConventionResultat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ConventionActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.programmation.convention.show", [
            "programmes" => ConventionActivite::all(),
            "type_programmes" => Partenaire::where('geler_pat', '=', 0)->get(),
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
        $id_convention=session('id_convention'); 

       // dd($id_convention);
        $convention = Convention::where('id', '=', $id_convention)->first();
       $convention = new ConventionActivite();

        $convention->resultat_tac = $request->resultat_a;
        $convention->code_tac = $request->code_a;
        $convention->intitule_tac = $request->intitule_a; 
        $convention->description = $request->convention; 
         $convention->idusrcreation_tac = Auth::user()->id;
        
        $convention->save();

        Flashy::success("convention activité ajouté avec succès");

        return redirect()->back();
    }

    
    public function edit($ids)
    {
        $tache=ConventionActivite::find($ids);
        return response()->json([
        'satuts'=>2000,
        'activite'=>$tache,
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
        $id_convention=session('id_convention'); 
        $convention = Convention::where('id', '=', $id_convention)->first();
        $convention=ConventionActivite::find($id);
        $convention->resultat_tac = $request->resultat_a;
        $convention->code_tac = $request->code_a;
        $convention->intitule_tac = $request->intitule_a; 
        $convention->description = $request->convention; 
        $convention->update();

        Flashy::success("Convention activité modifiée avec succès");
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
        $type = ConventionActivite::find($id);
        $type->geler_tac = 1;
        $type->update();

        Flashy::success("Convention activité supprimée avec succès");
        return redirect()->back();
        //return redirect()->route('programme.index');
    }
}
