<?php

namespace App\Http\Controllers\SuiviResultat;

use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\SuiviResultat\Classeur;
use App\Models\SuiviResultat\ColonneFeuille;
use App\Models\SuiviResultat\Feuille;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class ClasseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.suivi_resultat.classeur.liste", [
            "calsseurs" => Classeur::where([
                ['projet_cl', '=', session('id_projet')],
                ['geler_cl', '=', 0],
            ])->get(),
        ]);
    }

    public function storeData(Request $request)
    {
        $table_name = $request->input('tableName');

        $data = [];

        foreach ($request->except('_token', 'tableName') as $key => $value) {
            $data[$key] = $value;
        }

        DB::table($table_name)->insert($data);

        return redirect()->back()->with('success', 'Données enregistrées avec succès.');
    }

    public function view($id)
    {
        $id_classeur = $id;
        $classeur = Classeur::where([
            ['id_cl', '=', $id],
            ['geler_cl', '=', 0],
        ])->get();
        $feuilles = Feuille::where([
            ['classeur_f', '=', $id],
            ['geler_f', '=', 0],
        ])->get();
        return view("dashboard.suivi_resultat.classeur.view", [
            "feuilles" => $feuilles,
            "id_classeur" => $id_classeur,
            "classeur" => $classeur,
        ]);
    }

    public function show($id)
    {
       // dd($id);
        $feuille = Feuille::where('id_f', $id)
        ->where('geler_f', 0)
        ->first();

        $tableName = $feuille->table_f;
        $columns = DB::getSchemaBuilder()->getColumnListing($feuille->table_f);
        $types = array();

        foreach ($columns as $column) {
            $type = Schema::getColumnType($feuille->table_f, $column);
            $types[$column] = $type;
        }

        // dd($types);
        $column_type = 1;
        $id_classeur = $id;
        $feuilles = Feuille::where('table_f', $feuille->table_f)
            ->where('geler_f', 0)
            ->first();
        $id_f = $feuilles->id_f;

        //dd($id_f);

        $donnees = DB::table($tableName)->get();

        // dd($donnees);

        $colonne = ColonneFeuille::where('id_feuille', '=', $id_f)->get();
        // dd($colonne);

        return view("dashboard.suivi_resultat.classeur.show", [
            "feuilles" => $feuilles,
            "id_classeur" => $id_classeur,
            'tableName' => $tableName,
            'columns' => $columns,
            'colonne' => $colonne,
            'column_type' => $column_type,
            'donnees' => $donnees

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
        $classeur = new Classeur();

        $classeur->libelle_cl = $request->libelle;
        $classeur->couleur_cl = $request->couleur;
        $classeur->enregisrer_par_cl = Auth::user()->id;
        $classeur->projet_cl = session('id_projet');
        $classeur->save();

        Flashy::success("Classeur ajouté avec succès");

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function editFeuille(Request $request, $id)
    {
        $classeur = Feuille::find($id);
      //  dd($classeur);
        $ancienne_table = $classeur->table_f;

        // Modifier le nom de la table si nécessaire
        if ($ancienne_table !== $request->table_name) {
            // Vérifier si la table existe dans la base de données
            if (Schema::hasTable($ancienne_table)) {
                // Renommer la table en utilisant le schéma de la base de données
                Schema::rename($ancienne_table, $request->table_name);
            }
        }

        $classeur->nom_f = $request->nom;
        $classeur->table_f = $request->table_name;
        $classeur->modifier_par_f = Auth::user()->id;

        $classeur->save();

        Flashy::success("Feuille modifiée avec succès");

        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addColumnsToTable(Request $request)
    {
        $table_name = $request->input('tableName');
        $feuilles = Feuille::where('table_f', $table_name)
        ->where('geler_f', 0)
        ->first();
        $lastId=$feuilles->id_f;
        Schema::table($table_name, function (Blueprint $table) use ($request) {
            for ($j = 0; $j <= count($request->column_label_) - 1; $j++) {
                $table->{$request->input('column_type_')[$j]}($request->input('column_label_')[$j])->nullable();
            }
        });

        for ($j = 0; $j <= count($request->column_name_) - 1; $j++) {
            $colonne = new ColonneFeuille();
            $colonne->id_feuille = $lastId;
            $colonne->nom_colonne = $request->input('column_name_')[$j];
            $colonne->champ = $request->input('column_label_')[$j];
            $colonne->save();
        }
        return redirect()->route('classeur.index')->with('success', 'Colonnes ajoutées avec succès');
    }

    public function edit($id)
    {

        $classeur = Classeur::find($id);
        return response()->json([
            'satuts' => 2000,
            'classeur' => $classeur,
        ]);
    }
    public function edition($id,$table)
    {
        //$table="a";
        //
        $data=DB::table($table)->find($id);
        return response()->json([
            'satuts' => 2000,
            'data' => $data,
        ]);
        //dd($data);
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
        $classeur = Classeur::find($id);
        $classeur->libelle_cl = $request->libelle;
        $classeur->couleur_cl = $request->couleur;
        $classeur->modifier_par_cl = Auth::user()->id;

        $classeur->update();

        Flashy::success("Classeur modifié avec succès");

        return redirect()->back();
    }
       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function supprimer($id, $table)
     {
         // Code pour supprimer l'enregistrement
          DB::table($table)->where('id', $id)
             ->delete();
     
             Flashy::success("Donnée supprimée avec succès");
             return back();
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $ptba = Classeur::find($id);
        $ptba->geler_cl = 1;
        $ptba->update();

        Flashy::success("Classeur supprimé avec succès");
        return back();
    }
    public function modification(Request $request, $id, $table)
    {

        $table_name = $request->input('tableName');

        $data = [];

        foreach ($request->except('_token','_method', 'tableName') as $key => $value) {
            $data[$key] = $value;
        }

        DB::table($table_name)->where('id', $id)->update($data);

        Flashy::success("Data modifiée avec succès");

        return redirect()->back();
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function supprimerFeuille(Request $request, $id)
    {
        $ptba = Feuille::find($id);
      //  dd($ptba);
        if (Schema::hasTable($ptba->table_f)) {

           // return true;
            // Supprimer la table en utilisant le schéma de la base de données
            Schema::dropIfExists($ptba->table_f);
        }
       // $ptba->geler_f = 1;
        $ptba->delete();

        Flashy::success("Feuille supprimée avec succès");
        return redirect()->route('classeur.index');
    }

    public function supprimerColonne(Request $request)
    {
        $col_id=$request->id_colc;
        $id=ColonneFeuille::find($col_id);

        $feuille_name = $request->tableName;
        $col_name = $request->col_name;

        Schema::table($feuille_name, function(Blueprint $table) use ($col_name){

            $table->dropColumn("$col_name");
        });

        $id->delete();
        Flashy::success("Colonne supprimée avec succès");
        // return redirect()->route('classeur.index');
        return redirect()->back();
    }

    public function modifierColonne(Request $request)
    {   $col_id=$request->col_id;
        $id=ColonneFeuille::find($col_id);
        $col_lib_acien = $request->acien;
        $col_name = $request->col_name;
        $col_lib = $request->col_lib;
        $col_type = $request->col_type;
        $feuille_name= $request->feuille;
        $id->champ= $col_lib;
        $id->nom_colonne= $col_name;

        $id->update();
        Schema::table($feuille_name, function(Blueprint $table) use ($col_lib_acien,  $col_type){

            $table->$col_type("$col_lib_acien")->change();
            // $table->renameColumn("$col_lib_acien", "$col_lib");

        });

        Schema::table($feuille_name, function(Blueprint $table) use ($col_lib_acien, $col_lib,){

            $table->renameColumn("$col_lib_acien","$col_lib");
            // $table->renameColumn("$col_lib_acien", "$col_lib");


        });


        Flashy::success("Colonne mofidiée avec succès");
        // return redirect()->route('classeur.index');
        return redirect()->back();
    }
}
