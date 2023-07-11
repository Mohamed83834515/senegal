<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Fonction;
use App\Models\Parametrages\Partenaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /**  return view("dashboard.parametrage.autres.liste_fonction", [
         *   "fonctions" => fonction::all()
        *]);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $fonction = new Fonction();

        $fonction->nom_fnct = $request->nom;
        $fonction->description_fnct = $request->description;
        $fonction->agence_fnct = $request->agence;


        $fonction->save();

        Flashy::success("Fonction ajoutée avec succès");

        return redirect()->route('autres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

     public function edit($id)
     {
         $profils=Fonction::find($id);
         return response()->json([
         'satuts'=>2000,
         'Fonction'=>$profils,
         ]);
     }
    // public function edite(Fonction $fonction)
    // {
    //     return view('dashboard.parametrage.autres.edit_fonction', [
    //         'fonction' => $fonction,
    //         "autres"=> Partenaire::where('geler_pat','=',0)->get(),
    //     ]);
    // }
  


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {   
        $fonction = Fonction::find($id);
        $fonction->nom_fnct = $request->nom;
        $fonction->description_fnct = $request->description;
        $fonction->agence_fnct = $request->agence;
        $fonction->update();

        Flashy::success("Fonction modifiée avec succès");

        return redirect()->route('autres.index');
    }
     // public function update(Request $request, Fonction $fonction)
    // {
       
    //     $fonction->nom_fnct = $request->nom;
    //     $fonction->description_fnct = $request->description;
    //     $fonction->agence_fnct = $request->agence;

    //     $fonction->update();

    //     Flashy::success("Fonction modifiée avec succès");
        
    //     return redirect()->route('autres.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Fonction $fonction)
    {
        $fonction->geler_fnct = 1;
        $fonction->update();

        Flashy::success("Fonction supprimée avec succès");
        
        return redirect()->route('autres.index');
    }
}
