<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\NiveauCadreLogique;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class NiveauCadreLogiqueController extends Controller
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
        if(isset($request->id)){
            $id=$request->id;
            $type=NiveauCadreLogique::find($id);

            $type->libelle_ncl = $request->nom;
            $type->id_type_ncl = $request->type;
            $type->niveau_ncl = $request->niveau_ncl;
            $type->update();
            Flashy::success("Niveau modifier avec succès");
        }else
        {
          //  dd(session('id_programme'));
        $type = new NiveauCadreLogique();

        $type->libelle_ncl = $request->nom;
        $type->id_type_ncl = $request->type;
        $type->niveau_ncl = $request->niveau_ncl;
        $type->idprg_ncl= session('id_programme');

        $type->save();

        Flashy::success("Niveau ajouté avec succès");

        
        }
        return redirect()->route('cadre_logique.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ids)
    {
        $etat=1;
        $cadre=NiveauCadreLogique::find($ids);
        return response()->json([
        'satuts'=>2000,
        'niveau'=>$cadre,
        ]);
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* $type=NiveauCadreLogique::find($id);

        $type->libelle_ncl = $request->nom;
        $type->id_type_ncl = $request->type;
        $type->niveau_ncl = $request->niveau_ncl;
        $type->update();
        Flashy::success("Niveau modifier avec succès");

        return redirect()->route('cadre_logique.index'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cadre = NiveauCadreLogique::find($id);
        $cadre->geler_ncl = 1;
        $cadre->update();

        Flashy::success("Niveau cadre stratégique supprimé avec succès");

        return redirect()->route('cadre_logique.index');
    }
}
