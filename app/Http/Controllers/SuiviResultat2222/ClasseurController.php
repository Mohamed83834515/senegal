<?php

namespace App\Http\Controllers\SuiviResultat;

use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\SuiviResultat\Classeur;
use App\Models\SuiviResultat\Feuille;
use App\Models\User;
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
        $tableName = $id;
        $columns = DB::getSchemaBuilder()->getColumnListing($tableName);
        $types = array();

        foreach ($columns as $column) {
            $type = Schema::getColumnType($tableName, $column);
            $types[$column] = $type;
        }

        // dd($types);
        $column_type = 1;
        $id_classeur = $id;
        $feuilles = Feuille::where('nom_f', $id)
                    ->where('geler_f', 0)
                    ->get();

        return view("dashboard.suivi_resultat.classeur.show", [
            "feuilles" => $feuilles,
            "id_classeur" => $id_classeur,
            'tableName' => $tableName,
            'columns' => $columns,
            'column_type' => $column_type,
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




    public function edit($id)
    {

        $classeur = Classeur::find($id);
        return response()->json([
            'satuts' => 2000,
            'classeur' => $classeur,
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


    public function destroy(Request $request, $id)
    {
        $ptba = Classeur::find($id);
        $ptba->geler_cl = 1;
        $ptba->update();

        Flashy::success("Classeur supprimé avec succès");
        return back();
    }
}
