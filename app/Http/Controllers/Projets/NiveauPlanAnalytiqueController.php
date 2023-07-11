<?php

namespace App\Http\Controllers\Projets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\PlanAnalytique;
use App\Models\Parametrages\NiveauPlanAnalytique;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class NiveauPlanAnalytiqueController extends Controller
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
        $type = new NiveauPlanAnalytique();

        $type->libelle_npa = $request->nom;
        $type->niveau_npa = $request->niveau;
        $type->taille_npa = $request->taille;


        $type->save();

        Flashy::success("Niveau ajouté avec succès");

        return redirect()->route('plan_analytique.index');

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
        $cadre = NiveauPlanAnalytique::find($id);
        $cadre->geler_npa = 1;
        $cadre->update();

        Flashy::success("Niveau cadre résultat supprimé avec succès");

        return redirect()->route('plan_analytique.index');
    }
}
