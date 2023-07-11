<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\NiveauLocalite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;



class NiveauLocaliteController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(isset($request->id_n)){

            $id=$request->id_n;
            $type=NiveauLocalite::find($id);
            $type->libelle_nvl = $request->nom_n;
            $type->niveau = $request->niveau_n;
            $type->taille_nvl = $request->taille_n;
            $type->update();
            Flashy::success("Niveau modifieé avec succès");

        }else{
        $type = new NiveauLocalite();

        $type->libelle_nvl = $request->nom_n;
        $type->niveau = $request->niveau_n;
        $type->taille_nvl = $request->taille_n;
        $type->save();

        Flashy::success("Categorie ajoutée avec succès");
        }
        return redirect()->route('localite.index');

    }

    public function edit($ids)
    {
        $etat=1;
        $cadre=NiveauLocalite::find($ids);
        return response()->json([
        'satuts'=>2000,
        'niveau'=>$cadre,
        ]);
       
        
    }

    public function destroy( $id)
    {
        $cadre = NiveauLocalite::find($id);
        $cadre->geler_nvl = 1;
        $cadre->update();

        Flashy::success("Catégorie supprimée avec succès");

        return redirect()->route('localite.index');
    }

}
