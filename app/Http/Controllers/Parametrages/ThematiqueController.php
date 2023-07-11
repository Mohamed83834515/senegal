<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Thematique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class ThematiqueController extends Controller
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

        
        $thematique = new Thematique();

        $thematique->nom_tmq = $request->nom;
        $thematique->description_tmq = $request->description;
        $thematique->photo_tmq = $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : null;
    
        $thematique->save();

        Flashy::success("Thématique ajoutée avec succès");

        return redirect()->route('autres.index');
    }

   
    public function edit($id)
    {
        $profils=Thematique::find($id);
        return response()->json([
        'satuts'=>2000,
        'Thematique'=>$profils,
        ]);
    }

    // public function edit(Thematique $thematique)
    // {
    //     return view('dashboard.parametrage.autres.edit_thematique', [
    //         'thematique' => $thematique
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
           
        $thematique = Thematique::find($id);
        $thematique->nom_tmq = $request->nom;
        $thematique->description_tmq = $request->description;
        $thematique->photo_tmq = $request->file('photo') ? FileUtilsController::uploadFile($request->file('photo'), "thematique", 'uploads/produits/') : $thematique->photo_tmqo;

        $thematique->update();

        Flashy::success("Thématique modifiée avec succès");
        
        return redirect()->route('autres.index');
     }
 
    // public function update(Request $request, Thematique $thematique)
    // {
       
    //     $thematique->nom_tmq = $request->nom;
    //     $thematique->description_tmq = $request->description;
    //     $thematique->photo_tmq = $request->file('photo') ? FileUtilsController::uploadFile($request->file('photo'), "thematique", 'uploads/produits/') : $thematique->photo_tmqo;

    //     $thematique->update();

    //     Flashy::success("Thématique modifiée avec succès");
        
    //     return redirect()->route('autres.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thematique $thematique)
    {
        $thematique->geler_tmq = 1;
        $thematique->update();

        Flashy::success("Thématique supprimée avec succès");
        
        return redirect()->route('autres.index');
    }
}
