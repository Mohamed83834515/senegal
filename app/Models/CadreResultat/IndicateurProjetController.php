<?php

namespace App\Http\Controllers\Cadre_Resultat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;
use App\Models\CadreResultat\NiveauCadreResultatProjet;
use App\Models\CadreResultat\CadreResultatProjet;
use App\Models\CadreResultat\IndicateurCS;
use App\Models\CadreResultat\IndicateurProjet;
use App\Models\Parametrages\UniteIndicateur;

class IndicateurProjetController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indic= IndicateurCS::get();
        $ind= IndicateurProjet::join('cadre_resultat_projet_crp', 'indicateur_projet_iprj.niveau_iprj', '=', 'cadre_resultat_projet_crp.id_crp')
        ->where('cadre_resultat_projet_crp.id_niv_crp', '=', 1)
        ->get(['indicateur_projet_iprj.*','cadre_resultat_projet_crp.intitule_crp']);
        $indicateur= IndicateurProjet::where('geler_iprj', '=' ,0)->get();
        $intituleCadre=CadreResultatProjet::where('id_niv_crp', '=' , 1)->get();
        $NiveauCadre =NiveauCadreResultatProjet::where('id_ncrp', '=', 1)->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreResultatProjet::orderBy('niveau_ncrp', 'ASC')->get();
        return view("dashboard.cadre_resultat.indicateur_projet.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "indic" => $indic,
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
        $type = new IndicateurProjet();
        $type->niveau_iprj = $request->cadre_resultat;//
        //$type->liaison_prg_iprj = $request->code;
        $type->code_indicateur_iprj = $request->indicateurpcga;//
        $type->code_iprj = $request->code;//
        $type->intitule_iprj = $request->intitule;//
        $type->unite_iprj = $request->unite_mesure;//
        $type->intitule_cible_iprj = $request->initiale_valeur_cible;//
        $type->valeur_cible_iprj = $request->valeur_cible;//
        $type->valeur_cible_rmp_iprj = $request->cible_revue;//
        $type->intitule_reference_iprj = $request->initiale_valeur_ref;//
        $type->annee_reference_iprj = $request->annee_ref;//
        $type->valeur_reference_iprj = $request->valeur_ref;//cible_annee
        $type->periodicite_iprj = $request->periodicite;//
        $type->source_verification_iprj = $request->source;//

        $type->fonction_agregat_iprj = $request->mode_calcul;//
        //$type->referentiel_iprj = $request->niveau;
        //$type->typologie_iprj = $request->mothode_calcul;//
        $type->responsable_iprj = $request->responsable;//

        $type->fournisseur_iprj = $request->fournisseur;//
        //$type->description_iprj = $request->niveau;
        $type->echelle_iprj = $request->echele;//
        $type->mode_suivi_iprj = $request->mode_suivi;//

        $type->categorie_indicateur_iprj = $request->categorie;//
        $type->paccueil = $request->page;//
        $type->projet_iprj = 0;
        $type->save();

        Flashy::success("Indicateur ajouté avec succès");
        return redirect()->route('indicateur_projet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $num=$id;
        $indicateur= IndicateurCS::get();
        $ind= IndicateurProjet::join('cadre_resultat_projet_crp', 'indicateur_projet_iprj.niveau_iprj', '=', 'cadre_resultat_projet_crp.id_crp')
        ->where('cadre_resultat_projet_crp.id_niv_crp', '=', $id)
        ->get(['indicateur_projet_iprj.*','cadre_resultat_projet_crp.intitule_crp']);
        $NiveauCadre =NiveauCadreResultatProjet::where('id_ncrp', '=', $id)->get();
       $intituleCadre=CadreResultatProjet::where('id_niv_crp', '=' , $id)->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $niveau_cadres =NiveauCadreResultatProjet::orderBy('niveau_ncrp', 'ASC')->get();
        return view("dashboard.cadre_resultat.indicateur_projet.liste", [
            "niveau_cadres" => $niveau_cadres,
            "unite_mesure" => $unite_mesure,
            "NiveauCadre" => $NiveauCadre,
            "intituleCadre" => $intituleCadre,
            "indicateur" => $ind,
            "indic" => $indicateur,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicateur=IndicateurProjet::find($id);
        return response()->json([
        'satuts'=>2000,
        'indicateur'=>$indicateur,
        ]);

        return view("dashboard.cadre_resultat.indicateur_projet.edit", [
            
        ]);
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndicateurCS $type)
    {
       
        $type->niveau_iprj = $request->cadre_resultat;//
        //$type->liaison_prg_iprj = $request->code;
        $type->code_indicateur_iprj = $request->indicateurpcga;//
        $type->code_iprj = $request->code;//
        $type->intitule_iprj = $request->intitule;//
        $type->unite_iprj = $request->unite_mesure;//
        $type->intitule_cible_iprj = $request->initiale_valeur_cible;//
        $type->valeur_cible_iprj = $request->valeur_cible;//
        $type->valeur_cible_rmp_iprj = $request->cible_revue;//
        $type->intitule_reference_iprj = $request->initiale_valeur_ref;//
        $type->annee_reference_iprj = $request->annee_ref;//
        $type->valeur_reference_iprj = $request->valeur_ref;//cible_annee
        $type->periodicite_iprj = $request->periodicite;//
        $type->source_verification_iprj = $request->source;//

        $type->fonction_agregat_iprj = $request->mode_calcul;//
        //$type->referentiel_iprj = $request->niveau;
        //$type->typologie_iprj = $request->mothode_calcul;//
        $type->responsable_iprj = $request->responsable;//

        $type->fournisseur_iprj = $request->fournisseur;//
        //$type->description_iprj = $request->niveau;
        $type->echelle_iprj = $request->echele;//
        $type->mode_suivi_iprj = $request->mode_suivi;//

        $type->categorie_indicateur_iprj = $request->categorie;//
        $type->paccueil = $request->page;//
        $type->projet_iprj = 0;

        $type->update();

        Flashy::success("Indicateur modifié avec succès");
        
        return redirect()->route('indicateur_projet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndicateurProjet $indicateur)
    {
      
        //$indicateur->geler_iprj = 1;
       // $indicateur->update();

        Flashy::success("Indicateur supprimé avec succès");

        return redirect()->route('indicateur_projet.index');
    }

}