<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\TypePartenaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class TypePartenaireController extends Controller
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

        $type = new TypePartenaire();

        $type->nom_tpt = $request->nom;
        $type->description_tpt = $request->description;


        $type->save();

        Flashy::success("Type de partenaire ajouté avec succès");

        return redirect()->route('autres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $profils=TypePartenaire::find($id);
        return response()->json([
        'satuts'=>2000,
        'Partenaire'=>$profils,
        ]);
    }

    // public function edit(TypePartenaire $type)
    // {
    //     return view('dashboard.parametrage.autres.edit_type_partenaire', [
    //         'type' => $type
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
          
       $type = TypePartenaire::find($id);
       $type->nom_tpt = $request->nom;
       $type->description_tpt = $request->description;

       $type->update();

       Flashy::success("Type de partenaire modifié avec succès");
       
       return redirect()->route('autres.index');
    }

    // public function update(Request $request, TypePartenaire $type)
    // {
    //     $request->validate([
    //         'nom' => 'required|string',
    //         'description' => 'string',
    //     ]);
        
    //     $type->nom_tpt = $request->nom;
    //     $type->description_tpt = $request->description;

    //     $type->update();

    //     Flashy::success("Type de partenaire modifié avec succès");
        
    //     return redirect()->route('autres.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy(TypePartenaire $type)
    {
        $type->geler_tpt = 1;
        $type->update();

        Flashy::success("Type de partenaire supprimé avec succès");
        
        return redirect()->route('autres.index');
    }
}
