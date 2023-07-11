<?php

namespace App\Http\Controllers\SuiviResultat;
use Illuminate\Database\Schema\Blueprint;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuiviResultat\ClasseurController;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\SuiviResultat\ColonneFeuille;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\SuiviResultat\Feuille;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class FeuilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feuille = new Feuille();
        $colonne = new ColonneFeuille();
            $table_name = $request->input('table_name');
            
            Schema::create($table_name, function (Blueprint $table) use ($request) {
                $table->id();
                    for($j=0;$j<=count($request->column_label_) -1; $j++)
                    {
                        $table->{$request->input('column_type_')[$j]}($request->input('column_label_')[$j])->nullable();
                    }
            });
            $id=$request->id_classeur;
       
        $feuille->classeur_f = $request->id_classeur;
        $feuille->nom_f = $request->nom;
        $feuille->table_f = $table_name;
        $feuille->enregisrer_par_f = Auth::user()->id;
        $feuille->save();

        $lastId = Feuille::max('id_f');

        //dd($lastId);
                        for($j=0;$j<=count($request->column_label_) -1; $j++)
                    {
                        $table->{$request->input('column_type_')[$j]}($request->input('column_label_')[$j])->nullable();
                    }
        Flashy::success("Feuille ajoutée avec succès");
        return redirect()->route('classeur.index');
    }

  

  
    public function edit($id)
    {
        
        $feuille=Feuille::find($id);
        return response()->json([
        'satuts'=>2000,
        'feuille'=>$feuille,
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
        $classeur=Feuille::find($id);
        $classeur->libelle_cl = $request->libelle;
        $classeur->couleur_cl = $request->couleur;
        $classeur->modifier_par_cl = Auth::user()->id;
    
        $classeur->update();

        Flashy::success("Feuille modifiée avec succès");

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
        $ptba = Feuille::find($id);
        $ptba->geler_f = 1;
        $ptba->update();

        Flashy::success("Feuille supprimée avec succès");
        return redirect()->back();
    }
}
