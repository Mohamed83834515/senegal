<?php

namespace App\Http\Controllers\Cadre_Resultat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;
use App\Models\CadreResultat\NiveauCadreLogique;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\IndicateurCS;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\UniteIndicateur;
use Illuminate\Support\Facades\Auth;

class IndicateurCSController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=1;
        $statut=0;$num=1;
        $id_programme= session('id_programme');
        $cadr= NiveauCadreLogique::where([
                ['idprg_ncl','=', session('id_programme')],
                ['geler_ncl','=',0],
                ['niveau_ncl','=',1]
                ])->first();
    if(isset($cadr))
    {
        if(isset($id_programme))
       {
        $ind= IndicateurCS::where([
			['indicateur_programme_iprg.niveau_cl_iprg', '=', $cadr->id_ncl],
			['geler_iprg','=',0],
            ['projet_iprg','=',$id_programme]
            ])
        ->get();
       }
       else{
        $programme= session('projetuser')->first();
        session(['id_programme' => $programme->id_prg]);
        $ind= IndicateurCS::where([
			['indicateur_programme_iprg.niveau_cl_iprg', '=', $cadr->id_ncl],
			['geler_iprg','=',0],
            ['projet_iprg','=',$id_programme]
            ])
        ->get();
        
       }
       $intituleCadre=CadreLogique::where([
            ['id_niv_cl', '=' , $cadr->id_ncl],
            ['geler_cl','=',0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();
            $NiveauCadre =NiveauCadreLogique::where([
                ['id_ncl', '=', $cadr->id_ncl],
                ['geler_ncl','=',0],
                ])->get();
    }
    else
    {
        $NiveauCadre =NiveauCadreLogique::where([
			['id_ncl', '=', 0],
			['geler_ncl','=',0],
            ])->get();
        $intituleCadre=CadreLogique::where([
            ['id_niv_cl', '=' , 0],
            ['geler_cl','=',0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();
            $NiveauCadre =NiveauCadreLogique::where([
                ['id_ncl', '=', 0],
                ['geler_ncl','=',0],
                ])->get();
            $ind= IndicateurCS::where([
                ['indicateur_programme_iprg.niveau_cl_iprg', '=',0],
                ['geler_iprg','=',0],
                ['projet_iprg','=',$id_programme]
                ])
            ->get();
    }
       
  
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreLogique::where([ 
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->orderBy('niveau_ncl', 'ASC')->get();
        return view("dashboard.cadre_resultat.indicateur_cs.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "allCadre" => CadreLogique::where([
                ['geler_cl','=',0],
                ['idprg_cl','=',session('id_programme')]
            ]),
            "id"=>$num,
            "statut"=>$statut,
            "cadr"=> $cadr,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
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
        $cadr= NiveauCadreLogique::where([
            ['idprg_ncl','=', session('id_programme')],
            ['geler_ncl','=',0],
            ['niveau_ncl','=',1]
            ])->first();

        $type = new IndicateurCS();
        $type->code_iprg = $request->code;
        $type->intitule_iprg = $request->intitule;
        $type->niveau_iprg = $request->cadre;
        $type->intitule_cible_iprg = $request->initiale_cible;
        $type->valeur_cible_iprg = $request->valeur_cible;
        $type->annee_reference_iprg = $request->annee_ref;
        $type->valeur_reference_iprg = $request->valeur_ref;
        $type->unite_iprg = $request->unite_mesure;
        $type->source_verification_iprg = $request->source;
        $type->mode_calcul_iprg = $request->mode_calcul;
        $type->projet_iprg = session('id_programme');
        $type->enregistrer_par_iprg =Auth::user()->id;
        $type->periodicite_calcul_iprg = $request->periodicite;
        $type->donnees_sources_iprg = $request->donnees;
        $type->niveau_desagregation_iprg = $request->desagregation;
        // $type->moyen_diffusion_iprg = $request->moyen;
        $type->responsabilite_calcul_iprg = $request->responsabilite;
        $type->methode_collecte_iprg = $request->methode_collecte_iprg;
        $type->diffusion_iprg= $request->diffusion;

        if(session('id'))
        {
            $type->niveau_cl_iprg = session('id');
        }
        else
        {
            $type->niveau_cl_iprg = $cadr->id_ncl;
        }
        $type->page_iprg = $request->page;
        $type->save();

        

        Flashy::success("Indicateur ajouté avec succès");

        return redirect()->route('indicateur_cs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cadr= NiveauCadreLogique::where([
            ['idprg_ncl','=', session('id_programme')],
            ['geler_ncl','=',0],
            ['id_ncl','=',$id]
            ])->first();

        $statut=1;
        $num=$id;
        session(['id' => $id]);

        $ind= IndicateurCS::where([
			['indicateur_programme_iprg.niveau_cl_iprg', '=', $cadr->id_ncl],
			['geler_iprg','=',0],
            ['projet_iprg','=',session(('id_programme'))]
            ])
        ->get();

        $NiveauCadre =NiveauCadreLogique::where([
			['id_ncl', '=', $id],
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->get();

        $intituleCadre=CadreLogique::where([
            ['id_niv_cl', '=' , $cadr->id_ncl],
            ['geler_cl','=',0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();

        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();

        $niveau_cadres =NiveauCadreLogique::where([ 
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->orderBy('niveau_ncl', 'ASC')->get();
        return view("dashboard.cadre_resultat.indicateur_cs.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "allCadre" => CadreLogique::where([
                ['geler_cl','=',0],
                ['idprg_cl','=',session('id_programme')]
            ]),
            "id"=>$num,
            "statut"=>$statut,
            "cadr"=>$cadr,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
        ]);
    }

    public function edit($ids)
    {
        $cadre=IndicateurCS::find($ids);
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
        $type = IndicateurCS::find($id);
        $type->code_iprg = $request->code;
        $type->intitule_iprg = $request->intitule;
        $type->niveau_iprg = $request->cadre;
        $type->intitule_cible_iprg = $request->initiale_cible;
        $type->valeur_cible_iprg = $request->valeur_cible;
        $type->annee_reference_iprg = $request->annee_ref;
        $type->valeur_reference_iprg = $request->valeur_ref;
        $type->unite_iprg = $request->unite_mesure;
        $type->source_verification_iprg = $request->source;
        $type->mode_calcul_iprg = $request->mode_calcul;
        $type->page_iprg = $request->page;
        $type->update();

        

        Flashy::success("Indicateur modifier avec succès");

        return redirect()->route('indicateur_cs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $indicateur = IndicateurCS::find($id);
        $indicateur->geler_iprg = 1;
        $indicateur->update();

        Flashy::success("Indicateur supprimé avec succès");

        return redirect()->route('indicateur_cs.index');
    }

}