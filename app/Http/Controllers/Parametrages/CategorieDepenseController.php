<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\CategorieDepense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class CategorieDepenseController extends Controller
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


        $fonction = new CategorieDepense();

        $fonction->code_cat = $request->code;
        $fonction->nom_cat = $request->nom;


        $fonction->save();

        Flashy::success("Catégorie  ajoutée avec succès");

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
         $profils=CategorieDepense::find($id);
         return response()->json([
         'satuts'=>2000,
         'Categorie'=>$profils,
         ]);
     }
    // public function edit(CategorieDepense $categorie)
    // {
    //     return view('dashboard.parametrage.autres.edit_categorie', [
    //         'categorie' => $categorie
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
        $categorie = CategorieDepense::find($id);
           
            $categorie->code_cat = $request->code;
            $categorie->nom_cat = $request->nom;
    
            $categorie->update();
    
            Flashy::success("Catégorie modifiée avec succès");
            
            return redirect()->route('autres.index');
    }
     // public function update(Request $request, CategorieDepense $categorie)
    // {
       
    //     $categorie->code_cat = $request->code;
    //     $categorie->nom_cat = $request->nom;

    //     $categorie->update();

    //     Flashy::success("Catégorie modifiée avec succès");
        
    //     return redirect()->route('autres.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieDepense $categorie)
    {
        $categorie->geler_cat = 1;
        $categorie->update();

        Flashy::success("Catécorie supprimée avec succès");
        
        return redirect()->route('autres.index');
    }
}
