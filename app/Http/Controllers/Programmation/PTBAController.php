<?php

namespace App\Http\Controllers\Programmation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Programmation\ConventionResultat;
use App\Models\Programmation\PTBA;
use App\Models\Programmation\TypeActivite;
use App\Models\User;
use App\Models\CadreResultat\IndicateurCS;
use App\Models\Parametrages\Projet;
use App\Models\Parametrages\UniteIndicateur;
use App\Models\Programmation\PTBACout;
use App\Models\Programmation\PTBAIndicateur;
use App\Models\Programmation\PTBATache;
use App\Models\SuiviResultat\SuiviTachePTBA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PTBAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statut=0;
        $stat='Structure';
        $structures = Partenaire::where('geler_pat','=',0)->get();
        return view("dashboard.programmation.ptba.liste", [
            "ptba" => PTBA::where([
                  ['geler_ptba', '=', 0],
                ['projet_ptba','=',session('id_projet')]]
              
                )->get(),
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "type_activite" => TypeActivite::get(),
            "statut"=>$statut,
            "responsable"=> User::get(),
            "structures"=>$structures,
            
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
        $taches = PTBATache::where([
            ['geler_pt','=',0],
            ['type_activite_pt','=',$request->type_activite]
        ])->orderBy('id_pt', 'ASC')->get();

     // dd($taches);

        $convention = new PTBA();

        $convention->annee_ptba =2023;
        $convention->intitule_activite_ptba = $request->intitule;
        $convention->code_activite_ptba = $request->code_activite;
        $convention->type_activite_ptba = $request->type_activite;
        $convention->structure_ptba = $request->structure;
        $convention->partenaire_ptba = $request->partenaire;
        $convention->debut_ptba = $request->debut;
        $convention->projet_ptba = session('id_projet');
        $convention->zone_ptba = $request->zone;
        $convention->localite_ptba = $request->localite;
        $convention->observation_ptba = $request->observation;
        $convention->enregistrer_par_ptba = Auth::user()->id;
        $convention->trimestre1 = $request->trimestre1;
        $convention->trimestre2 = $request->trimestre2;
        $convention->trimestre3 = $request->trimestre3;
        $convention->trimestre4 = $request->trimestre4;
        $convention->save();

        $lastInsertId = DB::getPdo()->lastInsertId();

        foreach($taches as $tache)
        {
            $convention = new SuiviTachePTBA();
            $convention->id_tache_stp = $tache->id_pt;
            $convention->id_ptba_stp = $lastInsertId;
            $convention->proportion_stp = $tache->proportion_pt;
            // $convention->valide_stp = $request->valide_stp;
            $convention->projet_stp = session('id_projet');
            $convention->observation_stp = $request->observation_stp;
            $convention->enregisrer_par_stp = Auth::user()->id;
            $convention->save();
        }
        
        Flashy::success("PTBA ajouté avec succès");

        return redirect()->route('ptba.index');
    }

    
    /* public function show(PTBA $convention)
    {
        $statut=1;
        $allConvention= PTBA::get();
        session(['id_ptba' => $convention->id]);
        $convention = PTBA::where('id_ptba', '=', $convention->id)->first();
       
        return view('dashboard.programmation.ptba.show', [
            "convention" => $convention,
            "allConvention"=>$allConvention,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "utilisateurs" => User::get(),
            "statut"=>$statut,
        ]);
    } */

    public function show( $id)
    {
        $mois= array( 0  => "J", 1 => "F",2 => "M",3  => "A", 4 => "M",5 => "J",
        6  => "J", 7 => "A",8 => "S",9  => "O", 10 => "N",11 => "D",
        );
        $convention = PTBA::where('id_ptba','=',$id)->get();
       foreach($convention as $ptba)
       {
            $id=$ptba->id_ptba;
            $libelle=$ptba->code_activite_ptba.' '.$ptba->intitule_activite_ptba;
       }
       $type_activite = PTBA::join('ptba_tache_pt', 'ptba_tache_pt.type_activite_pt', '=', 'ptba.type_activite_ptba')
       ->where('id_ptba','=',$id)
       ->get('ptba_tache_pt.*','ptba.*');
        $allConvention= PTBA::get();
        $indic= IndicateurCS::where('geler_iprg', '=', 0)->get();
        $unite_mesure= UniteIndicateur::where('geler_uti', '=', 0)->get();
        $indicateurs=PTBAIndicateur::where([
                ['activite_ptba_pi', '=' , $id],
                ['geler_pi','=',0],
                ])->get();
                $cout=PTBACout::where([
                    ['activite_pc', '=' , $id],
                    ['geler_pc','=',0],
                    ])->get();
        return view('dashboard.programmation.ptba.show', [
            "convention" => $convention,
            "allConvention"=>$allConvention,
            "projets"=> Projet::where('geler_prj','=',0)->get(),
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
           // "ConventionResultat"=>$conventionResultat,
            //"ConventionActivite"=>$conventionActivite,
           // "utilisateurs" => User::get(),
           "libelle_ptba"=>$libelle,
           "id"=>$id,
           "type_activites" =>$type_activite,
           "responsable"=> User::get(),
           "id_activite" => $id,
           "mois"=>$mois,
           "unite_mesure" => $unite_mesure,
           "indic" => $indic,
           "indicateurs"=>$indicateurs,
           "couts"=>$cout,
        ]);
    }
 
    /**
     * add versement to the specified resource.
     *
     * @param  \App\Models\Programmation\ConventionResultat  $vente
     * @return \Illuminate\Http\Response
     */
    public function ajouterConvention(Request $request, ConventionResultat $vente = null)
    {
       // dd($vente);

        $validator = Validator::make($request->all(),[
            'versement' => 'required|numeric',
        ]);

        if ($validator->fails() || $vente == null) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $convention = new ConventionResultat();

            $convention->code_cvr = $request->code;
            $convention->convention_cvr = $vente->id;
            $convention->intitule_cvr = $request->intitule; 
            $convention->save();
            DB::commit();

            Flashy::success("Versement ajouté avec succès");
    
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }
        
        $convention = new ConventionResultat();

        $convention->code_cvr = $request->code;
        $convention->convention_cvr = $vente->id;
        $convention->intitule_cvr = $request->intitule; 
        $convention->save();

        Flashy::success("Versement ajouté avec succès");

        return redirect()->back();
    }

    
    public function show_projets($id,$type)
    {
        $partenaire = Programme::find($id);

        if (! $partenaire) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Aucun partenaire trouvé pour cet identifiant.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'projets' => $partenaire->projets($type)->get()
        ]);
    }

    public function show_by_type(int $type)
    {
        $programmes = Programme::whereJsonContains('type_partenaire',$type)->get();

        return response()->json([
            'status' => 'success',
            'programmes' => $programmes
        ]);
    }

    public function edit($id)
    {
        
        $indicateur=PTBA::find($id);
        return response()->json([
        'satuts'=>2000,
        'indicateur'=>$indicateur,
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
        $convention=PTBA::find($id);
        $convention->intitule_activite_ptba = $request->intitule;
        $convention->code_activite_ptba = $request->code_activite;
        $convention->type_activite_ptba = $request->type_activite;
        $convention->structure_ptba = $request->structure;
        $convention->partenaire_ptba = $request->partenaire;
        $convention->debut_ptba = $request->debut;
        $convention->projet_ptba = 0;
        $convention->zone_ptba = $request->zone;
        $convention->localite_ptba = $request->localite;
        $convention->observation_ptba = $request->observation;
        $convention->enregistrer_par_ptba = Auth::user()->id;
    
        $convention->update();

        Flashy::success("PTBA modifié avec succès");

        return redirect()->route('ptba.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(PTBA $ptba)
    {
        $ptba->geler_ptba = 1;
        $ptba->update();

        Flashy::success("PTBAT supprimé avec succès");
        
        return redirect()->route('ptba.index');
    }
}
