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
use App\Models\Programmation\ConventionResultat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ConventionResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.programmation.convention.show", [
            "programmes" => ConventionResultat::all(),
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
        $convention = new ConventionResultat();

        $convention->code_cvr = $request->code_r;
        $convention->convention_cvr = $id_convention;
        $convention->intitule_cvr = $request->intitule_r; 
        // $produit->quantite_pro = 0;
        // $produit->idusrcreation_pro = Auth::user()->id;
        
        $convention->save();
        
        Flashy::success("convention résultat ajouté avec succès");

        return redirect()->back();
    }

    
    public function show(Convention $convention)
    {
       
        
        $allConvention= Convention::get();
        
        $convention = Convention::where('id', '=', $convention->id)->first();
        
        return view('dashboard.programmation.convention.show', [
            "convention" => $convention,
            "allConvention"=>$allConvention,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "utilisateurs" => User::get(),
        ]);
    }
 

    public function edit($ids)
    {
        $tache=ConventionResultat::find($ids);
        return response()->json([
        'satuts'=>2000,
        'resultat'=>$tache,
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
         $convention=ConventionResultat::find($id);
         $convention->code_cvr = $request->code_r;
         $convention->convention_cvr = $id_convention;
         $convention->intitule_cvr = $request->intitule_r; 
    
        $convention->update();

        Flashy::success("Programme modifié avec succès");

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
         $type = ConventionResultat::find($id);
         $type->geler_cvr = 1;
         $type->update();
 
         Flashy::success("Convention résultat supprimée avec succès");
         return redirect()->back();
         //return redirect()->route('programme.index');
     }
}
