<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\PlanAnalytique;
use App\Models\Parametrages\NiveauPlanAnalytique;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\TypeCadreLogique;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PlanAnalytiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $statut=0;
        $id=1;
        $cadre_logique=PlanAnalytique::where([
            ['geler_pa', '=', 0],
            ['programme_pa','=',session('id_programme')],
            ])->orderBy('id_pa', 'ASC')->get();
            
        $cadre=CadreLogique::where('geler_cl', '=', 0)->get();
        $localiteByNiveau= PlanAnalytique::where([
			['id_niv_pa', '=' , $id],
			['geler_pa','=',0],
            ['programme_pa','=',session('id_programme')],
            ])->get();

            $cadr= NiveauPlanAnalytique::where([
                ['niveau_npa','=',$id],
                ['geler_npa','=',0],
                ['idprg_npa','=', session('id_programme')]
                ])->first();

        $niveau_cadres =NiveauPlanAnalytique::where([
            ['geler_npa', '=', 0],
            ['idprg_npa','=',session('id_programme')]
            ])->orderBy('niveau_npa')->get();
             
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        $niveauOne = NiveauPlanAnalytique::where([
			['niveau_npa', '=', 1],
			['geler_npa','=',0],
            ['idprg_npa','=',session('id_programme')]
            ])->first();
        return view("dashboard.cadre_resultat.plan_analytique.liste", [
            "niveau_cadres" => $niveau_cadres,
            "type_cadres" => $type_cadres,
            "cadre_logique" => $cadre_logique,
            "ByNiveau"=>$localiteByNiveau,
            "PremierNiveau" => $niveauOne,
            "niveau" => NiveauPlanAnalytique::where(
                [['geler_npa', '=', 0,],
                ['idprg_npa','=',session('id_programme')]
                ])->get(),
            "id"=>$id,
            "cadr"=>$cadr,
            "statut"=>$statut,
            "categorie"=>$niveau_cadres,
            "cadre"=>$cadre,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new PlanAnalytique();
        $type->code_pa = $request->code;
        $type->code_cor_pa = $request->code_cor;
        $type->structure_pa = 0;
        $type->programme_pa = session('id_programme');
        $type->intitule_pa = $request->intitule;
        $type->id_niv_pa = $request->niveau;
        $type->id_parent_pa=$request->parent;
        $type->id_personne_pa=0;
        $type->save();

        

        Flashy::success("Plan Analytique ajouté avec succès");

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
        $cadr= NiveauPlanAnalytique::where([
            ['niveau_npa','=',$id],
            ['geler_npa','=',0],
            ['idprg_npa','=', session('id_programme')]
            ])->first();

        $statut=1;
        $num=$id;
        $lib= $num-1;
        $cadre=CadreLogique::where('geler_cl', '=', 0)->get();
        $localites = PlanAnalytique::with(['parent.parent'])->where([
            ['geler_pa','=',0],
            ['programme_pa','=',session('id_programme')]
            ])
            ->orderBy('id_pa', 'ASC')
            ->get();
        $cadres= PlanAnalytique::where([
            ['geler_pa','=',0],
            ['programme_pa','=',session('id_programme')],
            ['id_niv_pa','=',$lib]
            ])->get();
           // dd($cadres);
        $PremierNiveau = NiveauPlanAnalytique::where([
			['niveau_npa', '=', $id],
			['geler_npa','=',0],
            ['idprg_npa','=',session('id_programme')]
            ])->first();
        $Avant = NiveauPlanAnalytique::where([
			['niveau_npa', '=', $lib],
			['geler_npa','=',0], 
            ['idprg_npa','=',session('id_programme')]
            ])->first();
        //dd($Avant);
        $localiteByNiveau= PlanAnalytique::where([
			['id_niv_pa', '=' , $id],
			['geler_pa','=',0],
            ])->get();
        $niveau_localites =NiveauPlanAnalytique::where([
            ['geler_npa', '=', 0],
            ['idprg_npa','=', session('id_programme')]
            ])->orderBy('niveau_npa')->get();
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        return view("dashboard.cadre_resultat.plan_analytique.liste", [
            "cadre_logique" => $localites,
            "type_cadres" => $type_cadres,
            "niveau_cadres" => $niveau_localites,
            "PremierNiveau" => $PremierNiveau,
            "niveau" => $niveau_localites,
            "ByNiveau" => $localiteByNiveau,
            "Avant" => $Avant,
            "id"=>$num,
            "cadr"=>$cadr,
            "statut"=>$statut,
            "cadres"=>$cadres,
            "categorie"=>$niveau_localites,
            "cadre"=>$cadre,
        ]);
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
    public function edit($ids)
    {
        $cadre=PlanAnalytique::find($ids);
        return response()->json([
        'satuts'=>2000,
        'cadre'=>$cadre,
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
        $type = PlanAnalytique::find($id);
        $type->code_pa = $request->code;
        $type->code_cor_pa = $request->code_cor;
        $type->intitule_pa = $request->intitule;
        $type->id_niv_pa = $request->niveau;
        $type->id_parent_pa=$request->parent;
        $type->id_personne_pa=0;
        $type->update();

        

        Flashy::success("Plan Analytique Modifier avec succès");

        return redirect()->route('plan_analytique.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cadre = PlanAnalytique::find($id);
        $cadre->geler_pa = 1;
        $cadre->update();

        Flashy::success("Plan Analytique supprimé avec succès");

        return redirect()->route('plan_analytique.index');
    }
}
