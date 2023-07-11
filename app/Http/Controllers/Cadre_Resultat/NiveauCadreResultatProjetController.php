<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\CadreResultat\CadreResultatProjet;
use App\Models\CadreResultat\NiveauCadreResultatProjet;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class NiveauCadreResultatProjetController extends Controller
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
        if(isset($request->id_ncrp)){

            $id=$request->id_ncrp;
            $type=NiveauCadreResultatProjet::find($id);
            $type->libelle_ncrp = $request->nom;
            $type->niveau_ncrp = $request->niveau_ncrp;
            $type->update();
            Flashy::success("Niveau modifieé avec succès");

        }else{
            $type = new NiveauCadreResultatProjet();
            $type->libelle_ncrp = $request->nom;
            $type->niveau_ncrp = $request->niveau_ncrp;
            $type->idprj_ncrp= session('id_projet');
            $type->save();
            Flashy::success("Niveau ajouté avec succès");
    }
        return redirect()->route('cadre_resultat_projet.index');

    }

    public function edit($ids)
    {
        $etat=1;
        $cadre=NiveauCadreResultatProjet::find($ids);
        return response()->json([
        'satuts'=>2000,
        'niveau'=>$cadre,
        ]);
       
        
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

    public function show_unite_gestions($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cadre = NiveauCadreResultatProjet::find($id);
        $cadre->geler_ncrp = 1;
        $cadre->update();

        Flashy::success("Niveau cadre résultat supprimé avec succès");

        return redirect()->route('cadre_resultat_projet.index');
    }
}
