<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\TypeProgramme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class TypeProgrammeController extends Controller
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

        $type_programme = new TypeProgramme();

        $type_programme->nom_tpr = $request->nom;
        $type_programme->description_tpr = $request->description;


        $type_programme->save();

        Flashy::success("Type de programme ajouté avec succès");

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
        $profils=TypeProgramme::find($id);
        return response()->json([
        'satuts'=>2000,
        'Programme'=>$profils,
        ]);
    }

    // public function edit(TypeProgramme $type_programme)
    // {
    //     return view('dashboard.parametrage.autres.edit_type_programme', [
    //         'type_programme' => $type_programme
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
          
       $type_programme = TypeProgramme::find($id);
       $type_programme->nom_tpr = $request->nom;
       $type_programme->description_tpr = $request->description;

       $type_programme->update();

       Flashy::success("Type de programme modifié avec succès");
       
       return redirect()->route('autres.index');
    }

    // public function update(Request $request, TypeProgramme $type_programme)
    // {
    //     $request->validate([
    //         'nom' => 'required|string',
    //         'description' => 'string',
    //     ]);
        
    //     $type_programme->nom_tpr = $request->nom;
    //     $type_programme->description_tpr = $request->description;

    //     $type_programme->update();

    //     Flashy::success("Type de programme modifié avec succès");
        
    //     return redirect()->route('autres.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy(TypeProgramme $type_programme)
    {
        $type_programme->geler_tpr = 1;
        $type_programme->update();

        Flashy::success("Type de programme supprimé avec succès");
        
        return redirect()->route('autres.index');
    }
}
