<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\PlanAnalytique;
use App\Models\Parametrages\NiveauPlanAnalytique;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

use function PHPUnit\Framework\isEmpty;

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
     //  dd( session('id_programme'));


    // dd($request->id_ni);
        if(isset($request->id_ni)){

            $id=$request->id_ni;
            $type=NiveauPlanAnalytique::find($id);
            $type->libelle_npa = $request->nom_ni;
            $type->niveau_npa = $request->niveau_ni;
            $type->taille_npa = $request->taille_ni;
            
            $type->update();
            Flashy::success("Niveau modifié avec succès");

        }else{
            $type = new NiveauPlanAnalytique();
            $type->libelle_npa = $request->nom_ni;
            $type->niveau_npa = $request->niveau_ni;
            $type->taille_npa = $request->taille_ni;
            $type->idprg_npa = session('id_programme');
            $type->save();
        Flashy::success("Niveau ajouté avec succès");
        }
        return redirect()->route('plan_analytique.index');

    }

    public function edit($ids)
    {
        $etat=1;
        $cadre=NiveauPlanAnalytique::find($ids);
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
        $cadre = NiveauPlanAnalytique::find($id);
        $cadre->geler_npa = 1;
        $cadre->update();

        Flashy::success("Niveau cadre résultat supprimé avec succès");

        return redirect()->route('plan_analytique.index');
    }
}
