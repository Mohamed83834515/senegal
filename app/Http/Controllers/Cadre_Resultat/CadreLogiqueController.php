<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use App\Models\Parametrages\NiveauLocalite;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\CadreResultat\CadreLogique;
use App\Models\CadreResultat\NiveauCadreLogique;
use App\Models\CadreResultat\TypeCadreLogique;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\Projet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class CadreLogiqueController extends Controller
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
        $cadre_logique=CadreLogique::where([
            ['geler_cl', '=', 0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();

     $progra =Programme::where('geler_prg', '=', 0)->first();

    
     if(session('id_programme'))
     {
            $id_programme= session('id_programme');
     }
     else
     {
        $id_programme = $progra->id_prg;
     }

    // dd($id_programme);
   

       $cadr= NiveauCadreLogique::where([
        ['niveau_ncl','=',$id],
        ['idprg_ncl','=', $id_programme],
        ['geler_ncl','=',0]
        ])->first();
    //  dd($cadr->id_ncl);
       
       
       if(isset($id_programme))
       {
        $localiteByNiveau= CadreLogique::where([
			['id_niv_cl', '=' , $id],
			['geler_cl','=',0],
           ['idprg_cl','=',$id_programme]
            ])->get();
       }
       else{
        $programme= session('projetuser')->first();
        session(['id_programme' => $programme->id_prg]);
        $localiteByNiveau= CadreLogique::where([
			['id_niv_cl', '=' , $cadr->id_ncl],
			['geler_cl','=',0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();
       }

       
        $niveau_cadres =NiveauCadreLogique::where([
           [ 'geler_ncl', '=', 0],
            ['idprg_ncl','=', $id_programme]
            ])->orderBy('niveau_ncl')->get();
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        $niveauOne = NiveauCadreLogique::where([
			['niveau_ncl', '=' , $id],
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->first();
        return view("dashboard.cadre_resultat.cadre_logique.liste", [
            "niveau_cadres" => $niveau_cadres,
            "type_cadres" => $type_cadres,
            "cadre_logique" => $cadre_logique,
            "ByNiveau"=>$localiteByNiveau,
            "PremierNiveau" => $niveauOne,
            "niveau" => NiveauCadreLogique::where(
                [['geler_ncl', '=', 0],
                ['idprg_ncl','=',session('id_programme')]
                ])->get(),
            "id"=>$id,
            "cadr"=>$cadr,
            "statut"=>$statut,
            "categorie"=>$niveau_cadres,
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
        //dd($request->niveau);
        
        $type = new CadreLogique();
        $type->code_cl = $request->code;
        $type->projet_cl = $request->programme;
        $type->intitule_cl = $request->intitule;
        $type->cout_cl = $request->cout;
        $type->id_niv_cl = $request->niveau;
        $type->id_parent_cl=$request->parent;
        $type->idprg_cl= session('id_programme');
        $type->save();

        Flashy::success("Cadre strategique ajouté avec succès");

        return redirect()->route('cadre_logique.index');
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
            ['niveau_ncl','=',$id],
            ['idprg_ncl','=', session('id_programme')],
            ['geler_ncl','=',0]
            ])->first();
      // dd(session('id_programme'));
       
        $statut=1;
        $num=$id;
        $lib= $num-1;
        $localites = CadreLogique::with(['parent.parent'])->where([
            ['geler_cl', '=', 0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();
        $cadres= CadreLogique::where([
            ['geler_cl', '=', 0],
            ['idprg_cl','=',session('id_programme')]
            ])->get();
        $PremierNiveau = NiveauCadreLogique::where([
			['niveau_ncl', '=' , $id],
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->first();
        $Avant = NiveauCadreLogique::where([
			['niveau_ncl', '=' , $lib],
			['geler_ncl','=',0],
            ['idprg_ncl','=',session('id_programme')]
            ])->first();
        //dd($Avant);
        $localiteByNiveau= CadreLogique::where([
			['id_niv_cl', '=' , $cadr->id_ncl],
			['geler_cl','=',0],
            ]);
        $niveau_localites =NiveauCadreLogique::where([
            [ 'geler_ncl', '=', 0],
             ['idprg_ncl','=', session('id_programme')]
             ])->orderBy('id_ncl')->get();
        $type_cadres =TypeCadreLogique::where('geler_tcl', '=', 0)->get();
        return view("dashboard.cadre_resultat.cadre_logique.liste", [
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
        ]);
       
    }

    public function show_unite_gestions($id)
    {

    }
    public function edit($ids)
    {
        $cadre=CadreLogique::find($ids);
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
        $cadre_logique=CadreLogique::find($id);
        $cadre_logique->code_cl = $request->code;
        $cadre_logique->intitule_cl = $request->intitule;
        $cadre_logique->cout_cl = $request->cout;
        $cadre_logique->id_parent_cl=$request->parent;
        $cadre_logique->update();

        Flashy::success("Cadre strategique modifier avec succès");

        return redirect()->route('cadre_logique.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicateur=CadreLogique::find($id);
        $indicateur->geler_cl = 1;
        $indicateur->update();

        Flashy::success("Cadre stratégique supprimé avec succès");

        return redirect()->route('cadre_logique.index');
    }
}
