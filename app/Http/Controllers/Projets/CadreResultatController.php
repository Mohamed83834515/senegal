<?php

namespace App\Http\Controllers\Projets;

use App\Http\Controllers\Controller;
use App\Models\Parametrages\NiveauLocalite;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\CadreResultat\CadreResultatProjet;
use App\Models\CadreResultat\NiveauCadreResultatProjet;
use App\Models\CadreResultat\TypeCadreLogique;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\NiveauCadreLogique;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\Projet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class CadreResultatController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id=Auth::user()->id;
        $projets = DB::table('projet_prj')
        ->join('projets_users_pru', 'projet_prj.id_prj', '=', 'projets_users_pru.idprj_pru')
        ->join('programme_prg', 'projet_prj.idprg_prj', '=', 'programme_prg.id_prg')
        ->where('projets_users_pru.iduser_pru', '=', $id)
        ->select('projet_prj.*','programme_prg.*')
        ->get();
         $programmes= Programme::where('geler_prg', '=', 0)->get();
         session(['programmes'=>$programmes]);
        // dd(session('programmes'));
      session(['projetuser' => $projets]);
      $premier=session('projetuser')->first();
      $project= Projet::where('geler_prj', '=', 0)->get();
      session(['project' =>  $project]); 
      
      $programmedefaut= Programme::where('geler_prg','=',0)->first();
      session(['programmedefaut' => $programmedefaut]);
      $idone= $premier->id_prg;
        session(['idproj'=> $idone]);
      session(['AllProjets' => $premier]);



        $statut=0;
        $id=1;
        $cadre_logique=CadreResultatProjet::where([
            ['geler_crp', '=', 0,],
            ['projet_crp','=',session('id_projet')]
        ]   )->get();
    //    dd(session('id_projet'));    
        $cadre=CadreLogique::where('geler_cl', '=', 0)->get();
        $localiteByNiveau= CadreResultatProjet::where([
			['id_niv_crp', '=' , $id],
			['geler_crp','=',0],
            ])->get();
        $niveau_cadres =NiveauCadreResultatProjet::where([
            ['geler_ncrp', '=', 0],
            ['idprj_ncrp','=',session('id_projet')]
            ])->orderBy('niveau_ncrp')->get();
            
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        $niveauOne = NiveauCadreResultatProjet::where([
			['niveau_ncrp', '=', 1],
			['geler_ncrp','=',0],
            ['idprj_ncrp','=',session('id_projet')]
            ])->first();
        return view("dashboard.projets.cadre_resultat_projet.liste", [
            "niveau_cadres" => $niveau_cadres,
            "type_cadres" => $type_cadres,
            "cadre_logique" => $cadre_logique,
            "ByNiveau"=>$localiteByNiveau,
            "PremierNiveau" => $niveauOne,
            "niveau" => NiveauCadreResultatProjet::where('geler_ncrp', '=', 0)->get(),
            "id"=>$id,
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
        $type = new CadreResultatProjet();
        $type->code_crp = $request->code;
        $type->projet_crp = session('id_projet');
        $type->intitule_crp = $request->intitule;
        $type->type_resultat_crp = $request->type;
        $type->id_niv_crp = $request->niveau;
        $type->id_parent_crp=$request->parent;
        $type->liaison_crp=$request->liaison;
        $type->save();

        

        Flashy::success("Cadre résultat ajouté avec succès");

        return redirect()->route('cadre_resultat_projet.index');
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
        $lib= $num-1;
        $cadr= NiveauCadreResultatProjet::where('niveau_ncrp','=',$id)->first();

        $cadre=CadreLogique::where('geler_cl', '=', 0)->get();
        $localites = CadreResultatProjet::with(['parent.parent'])->where([
            ['geler_crp','=',0],
            ['projet_crp','=',session('id_projet')]
            ])->get();
        $cadres= CadreResultatProjet::where('geler_crp','=',0)->get();
        $PremierNiveau = NiveauCadreResultatProjet::where([
			['id_ncrp', '=', $id],
			['geler_ncrp','=',0],
            ])->first();
        $Avant = NiveauCadreResultatProjet::where([
			['id_ncrp', '=', $lib],
			['geler_ncrp','=',0],
            ])->first();
        //dd($Avant);
        $localiteByNiveau= CadreResultatProjet::where([
			['id_niv_crp', '=' , $id],
			['geler_crp','=',0],
            ])->get();
        $niveau_localites =NiveauCadreResultatProjet::where([
            ['geler_ncrp', '=', 0],
            ['idprj_ncrp','=',session('id_projet')]
            ])->orderBy('niveau_ncrp')->get();
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        return view("dashboard.projets.cadre_resultat_projet.liste", [
            "cadre_logique" => $localites,
            "type_cadres" => $type_cadres,
            "niveau_cadres" => $niveau_localites,
            "PremierNiveau" => $PremierNiveau,
            "niveau" => $niveau_localites,
            "ByNiveau" => $localiteByNiveau,
            "Avant" => $Avant,
            "id"=>$num,
            "statut"=>$statut,
            "cadr"=>$cadr,
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
        $cadre=CadreResultatProjet::find($ids);
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
        $type = CadreResultatProjet::find($id);
        $type->code_crp = $request->code;
        $type->intitule_crp = $request->intitule;
        $type->type_resultat_crp = $request->type;
        $type->id_parent_crp=$request->parent;
        $type->liaison_crp=$request->liaison;
        $type->update();

        

        Flashy::success("Cadre résultat Modifier avec succès");

        return redirect()->route('cadre_resultat_projet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cadre = CadreResultatProjet::find($id);
        $cadre->geler_crp = 1;
        $cadre->update();

        Flashy::success("Cadre résultat supprimé avec succès");

        return redirect()->route('cadre_resultat_projet.index');
    }
}
