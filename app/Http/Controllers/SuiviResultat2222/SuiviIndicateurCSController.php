<?php

namespace App\Http\Controllers\SuiviResultat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;
use App\Models\CadreResultat\NiveauCadreLogique;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\IndicateurCS;
use App\Models\Parametrages\UniteIndicateur;
use App\Models\SuiviResultat\SuiviIndicateurPP;

class SuiviIndicateurCSController extends Controller
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

       
       if(isset($id_programme))
       {
        $ind= IndicateurCS::join('cadre_logique_cl', 'indicateur_programme_iprg.niveau_iprg', '=', 'cadre_logique_cl.id_cl')
        ->where([
			['cadre_logique_cl.id_niv_cl', '=', $id],
			['geler_iprg','=',0],
            ['projet_iprg','=',$id_programme]
            ])
        ->get(['indicateur_programme_iprg.*','cadre_logique_cl.*']);
       }
       else{
        $programme= session('projetuser')->first();
        session(['id_programme' => $programme->id_prg]);
        $ind= IndicateurCS::join('cadre_logique_cl', 'indicateur_programme_iprg.niveau_iprg', '=', 'cadre_logique_cl.id_cl')
        ->where([
			['cadre_logique_cl.id_niv_cl', '=', $programme->id_prg],
			['geler_iprg','=',0],
            ['projet_iprg','=',session('id_programme')]
            ])
        ->get(['indicateur_programme_iprg.*','cadre_logique_cl.*']);
        
       }
        // $ind= IndicateurCS::join('cadre_logique_cl', 'indicateur_programme_iprg.niveau_iprg', '=', 'cadre_logique_cl.id_cl')
        // ->where([
		// 	['cadre_logique_cl.id_niv_cl', '=', $id],
		// 	['geler_iprg','=',0],
        //     ])
        // ->get(['indicateur_programme_iprg.*','cadre_logique_cl.intitule_cl']);
        $intituleCadre=CadreLogique::where([
            ['id_niv_cl', '=' , $id],
            ['geler_cl','=',0],
            ])->get();
        $NiveauCadre =NiveauCadreLogique::where([
            ['id_ncl', '=', $id],
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreLogique::where([
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->orderBy('niveau_ncl', 'ASC')->get();
        return view("dashboard.suivi_resultat.suivi_indicateur_cs.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "id"=>$num,
            "statut"=>$statut,
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
        $type->projet_iprg = 0;
        $type->enregistrer_par_iprg = $request->niveau;
        $type->page_iprg = $request->page;
        $type->save();

        

        Flashy::success("Indicateur ajouté avec succès");

        return redirect()->route('suivi_indicateur_cs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statut=1;
        $num=$id;
        $ind= IndicateurCS::join('cadre_logique_cl', 'indicateur_programme_iprg.niveau_iprg', '=', 'cadre_logique_cl.id_cl')
        ->where([
			['cadre_logique_cl.id_niv_cl', '=', $id],
			['geler_iprg','=',0],
            ])
        ->get(['indicateur_programme_iprg.*','cadre_logique_cl.*']);
        $NiveauCadre =NiveauCadreLogique::where([
            ['id_ncl', '=', $id],
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->get();
       $intituleCadre=CadreLogique::where([
        ['id_niv_cl', '=' , $id],
        ['geler_cl','=',0],
        ])->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreLogique::where([
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->orderBy('niveau_ncl', 'ASC')->get();
        return view("dashboard.suivi_resultat.suivi_indicateur_cs.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "id"=>$num,
            "statut"=>$statut,
        ]);
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function suivi($id)
    {
        
        $statut=1;
        $num=$id;
        $ind= IndicateurCS::where([
			['id_iprg', '=', $id],
			['geler_iprg','=',0],
            ])
        ->get();
        $ListesSuiviIndi = SuiviIndicateurPP::where([
			['suivi_indicateur_pp.id_indicateur_pp', '=', $id],
            ['suivi_indicateur_pp.id_programme_pp', '=', session('id_programme')],
			['geler_pp','=',0],
            ])
        ->get();

        $NiveauCadre =NiveauCadreLogique::where([
            ['id_ncl', '=', $id],
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->get();
       $intituleCadre=CadreLogique::where([
        ['id_niv_cl', '=' , $id],
        ['geler_cl','=',0],
        ])->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreLogique::where([
            ['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->orderBy('niveau_ncl', 'ASC')->get();
        return view("dashboard.suivi_resultat.suivi_indicateur_cs.suivi", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "ListesSuiviIndi"=> $ListesSuiviIndi,
            "id"=>$num,
            "statut"=>$statut,
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

        return redirect()->route('suivi_indicateur_cs.index');
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

        return redirect()->route('suivi_indicateur_cs.index');
    }

}