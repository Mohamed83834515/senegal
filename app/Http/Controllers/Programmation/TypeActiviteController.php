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
use App\Models\Programmation\TypeActivite;
use App\Models\Programmation\TypeTache;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class TypeActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('ptba_tache_pt')
            ->select('type_activite_pt', DB::raw('COUNT(id_pt) as total_tache'))
            ->groupBy('type_activite_pt')
            ->where('geler_pt','=',0)
            ->get();

        //   dd($orders);

        return view("dashboard.programmation.TypeActivite.liste", [
            "programmes" => TypeActivite::where('geler_tpa', '=', 0)->get(),
            "type_programmes" => Partenaire::where('geler_pat', '=', 0)->get(),
            "orders" => $orders
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
        $type_activite = new TypeActivite();
        $type_activite->code_tpa = $request->code;
        $type_activite->libelle_tpa = $request->intitule;
        $type_activite->idusrcreation_tpa = Auth::user()->id;
        $type_activite->save();
        Flashy::success("Type d'activité ajouté avec succès");
        return redirect()->route('type_activite.index');
    }

    
    public function show($id)
    {
       // dd($id);
        $typeactivite = TypeActivite::where('id_tpa','=',$id)->get();
        $allactivite= TypeActivite::get();
       //dd($typeactivite);

       $orders = DB::table('ptba_tache_pt')
       ->select('type_activite_pt', DB::raw('SUM(proportion_pt) as total_proportion'))
       ->groupBy('type_activite_pt')
       ->where([
        ['type_activite_pt','=',$id],
        ['geler_pt','=',0]
        ])
       ->first();

       //dd($orders);

       foreach($typeactivite as $activite)
       {
            $id=$activite->id_tpa;
            $libelle_tpa=$activite->code_tpa.' '.$activite->libelle_tpa;
       }
      
        return view('dashboard.programmation.TypeActivite.show', [
            "all"=>$allactivite,
            "id_activite" => $id,
            "libelle_tpa" => $libelle_tpa,
            "taches" => PTBATache::where([
                ['geler_pt', '=', 0],
                ['type_activite_pt','=',$id]
                ])->orderBy('id_pt', 'ASC')->get(),
            "orders"=> $orders
        ]);
    }
 

    public function edit($ids)
    {
        $type=TypeActivite::find($ids);
        return response()->json([
        'satuts'=>2000,
        'type'=>$type,
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
        $type_activite = TypeActivite::find($id);
        $type_activite->code_tpa = $request->code;
        $type_activite->libelle_tpa = $request->intitule;
    
        $type_activite->update();

        Flashy::success("Type d'activité  modifié avec succès");

        return redirect()->route('type_activite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $type = TypeActivite::find($id);
        $type->geler_tpa = 1;
        $type->update();

        Flashy::success("Type d'activité' supprimé avec succès");
        
        return redirect()->route('type_activite.index');
    }
}
