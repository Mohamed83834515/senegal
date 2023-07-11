<?php

namespace App\Http\Controllers\rapport_dynamique;

use App\Http\Controllers\Controller;
use App\Models\rapport\RapportDynamique;
use App\Models\SuiviResultat\Classeur;
use App\Models\SuiviResultat\ColonneFeuille;
use App\Models\SuiviResultat\Feuille;
use DebugBar\DataFormatter\DataFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class rapport_dynamique extends Controller
{
    public function index () {
        $classeur = Classeur::where('geler_cl', 0)->get();

        // $feuilles = Feuille::where('geler_f', 0)->get();
        return view("dashboard.rapport_dynamique.rapport.liste",[
            'classeur'=>$classeur,
            'rapport'=> RapportDynamique::all(),
        ]);
    }
    public function get_feuille($id_f){

        $feuilles =Feuille::where('classeur_f', $id_f)->get();

        return response()->json([
            'status'=>200,
            'feuilles'=>$feuilles
        ]);
    }

    public function get_colonne($id_c){

        $colonne =ColonneFeuille::where('id_feuille', $id_c)->get();

        return response()->json([
            'status'=>200,
            'colonnes'=>$colonne
        ]);
    }

    public function addRapport (Request $request){

        RapportDynamique::create([
        'nom_rapport' => $request->libelle,
        'requette_rapport' => $request->operation,
        'condition' => $request->condition,
        'operateur' => $request->operateur,
        'valeur' => $request->valeur,
        'table_rapport' => implode(', ',$request->table),
        'colonne_rapport' => implode(', ',$request->colonne),

        ]);
        Flashy::success("rapport ajouté avec succès");

        return redirect()->back();
    }

    public function show($id){
        $info=RapportDynamique::find($id);
        $nom=$info->nom_rapport;
        $table=$info->table_rapport;
        $colonne=$info->colonne_rapport;
        $condition=$info->condition;
        $operateur=$info->operateur;
        $tables=explode(',', $table);
        $join=implode('.id=', $tables);
        $valeur=$info->valeur;
        $col=explode(',',$colonne);
        if(!$valeur==null){
        $close="and"; $val="'$valeur'";
        } else{ $close=""; $val="";}
        $rapport=DB::select("select DISTINCT $colonne  from $table where $join.id $close $condition $operateur $val");

        // $coll=implode('<th>', $col);

        return view("dashboard.rapport_dynamique.rapport.show", [
        'rapport'=>$rapport,
        'table'=>$table,
        'colonne'=>$col,
        'nom'=>$nom,
        'join'=>$join
        ]);
    }

    public function destroy($id){

        $id=RapportDynamique::find($id);

        $id->delete();

        Flashy::success("rapport supprimé avec succès");

        return redirect()->back();
    }
}
