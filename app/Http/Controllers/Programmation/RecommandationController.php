<?php

namespace App\Http\Controllers\Programmation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\TypeProgramme;
use App\Models\Programmation\Convention;
use App\Models\Programmation\ConventionResultat;
use App\Models\Programmation\PTBATache;
use App\Models\Programmation\Recommandation;
use App\Models\Programmation\RecommandationAction;
use App\Models\Programmation\TypeTache;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class RecommandationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.programmation.recommandation.liste", [
            "programmes" => Recommandation::where('geler_rc', '=', 0)->get(),
            "type_programmes" => Partenaire::where('geler_pat', '=', 0)->get(),
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
        $recommandation = new Recommandation();
        $recommandation->code_rc = $request->code;
        $recommandation->intitule_rc = $request->intitule;
        $recommandation->projet_rc = 0;
        $recommandation->partenaires_rc = $request->partenaire;
        $recommandation->region_concerne_rc = $request->lieu;
        $recommandation->objectif_rc = $request->objectif;
        $recommandation->debut_rc = $request->debut;
        $recommandation->fin_rc = $request->fin;
        $recommandation->enregistrer_par_rc = Auth::user()->id;
        $recommandation->save();
        Flashy::success("Récommandation ajoutée avec succès");
        return redirect()->route('recommandation.index');
    }

    
    public function show($id)
    {
       // dd($id);
        $typeactivite = Recommandation::where('id_rc','=',$id)->get();
        $allactivite= Recommandation::get();
       //dd($typeactivite);

       foreach($typeactivite as $activite)
       {
            $id=$activite->id_tpa;
            $libelle_tpa=$activite->code_tpa.' '.$activite->libelle_tpa;
       }
      
        return view('dashboard.programmation.recommandation.show', [
            "all"=>$allactivite,
            "action"=>RecommandationAction::get(),
            "types"=>Partenaire::get(),
            "id_activite" => $id,
            "libelle_tpa" => $libelle_tpa,
            "partenaires"=> Partenaire::get(),
            "taches" => PTBATache::where('geler_pt', '=', 0)->get(),
        ]);
    }
 

    public function edit($ids)
    {
        $type=Recommandation::find($ids);
        return response()->json([
        'satuts'=>2000,
        'recommandation'=>$type,
        ]);

        
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recommandation = Recommandation::find($id);
        $recommandation->code_rc = $request->code;
        $recommandation->intitule_rc = $request->intitule;
        $recommandation->projet_rc = 0;
        $recommandation->partenaires_rc = $request->partenaire;
        $recommandation->region_concerne_rc = $request->lieu;
        $recommandation->objectif_rc = $request->objectif;
        $recommandation->debut_rc = $request->debut;
        $recommandation->fin_rc = $request->fin;
        $recommandation->modifier_par_rc = Auth::user()->id;
    
        $recommandation->update();

        Flashy::success("Récommandation  modifiée avec succès");

        return redirect()->route('recommandation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $type = Recommandation::find($id);
        $type->geler_rc = 1;
        $type->update();

        Flashy::success("Récommandation supprimée avec succès");
        
        return redirect()->route('recommandation.index');
    }
}
