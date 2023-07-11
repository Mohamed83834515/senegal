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
use App\Models\Programmation\PTBATache;
use App\Models\Programmation\TypeActivite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PTBATacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.programmation.TypeActivite.show", [
           // "tache" => PTBATache::where('geler_pt', '=', 0)->get(),
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
      // dd(session('id_projet'));
        $type_tache = new PTBATache();
        $type_tache->code_pt = $request->code;
        $type_tache->type_activite_pt = $request->type_activite;
        $type_tache->proportion_pt = $request->proportion;
        $type_tache->intitule_pt = $request->intitule;
        $type_tache->enregistrer_par_pt = Auth::user()->id;
        
        $type_tache->save();
        Flashy::success("Tâche ajoutée avec succès");
        return redirect()->back();
    }

    
   /*  public function show(Convention $convention)
    {
        $allConvention= Convention::get();
        $convention = Convention::where('id', '=', $convention->id)->first();
        return view('dashboard.programmation.TypeActivite.show', [
            "convention" => $convention,
            "allConvention"=>$allConvention,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "utilisateurs" => User::get(),
        ]);
    } */
 

    public function edit($ids)
    {
        $tache=PTBATache::find($ids);
        return response()->json([
        'satuts'=>2000,
        'tache'=>$tache,
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
        $type_tache = PTBATache::find($id);
        $type_tache->code_pt = $request->code;
        $type_tache->type_activite_pt = $request->type_activite;
        $type_tache->proportion_pt = $request->proportion;
        $type_tache->intitule_pt = $request->intitule;
        $type_tache->modifier_par_pt = Auth::user()->id;
    
        $type_tache->update();

        Flashy::success("Tâche modifiée avec succès");
        return redirect()->back();
        //return redirect()->route('programme.index');
    }
    public function update_planification(Request $request, $id)
    {
        $type_tache = PTBATache::find($id);
        $type_tache->responsable_pt = $request->responsable;
        $type_tache->lot_pt = $request->lot;
        $test = array();
        
        $type_tache->periode_pt = $request->debut;
        $type_tache->date_debut_pt = $request->date_debut;
        $type_tache->date_fin_pt = $request->date_fin;
        $type_tache->modifier_par_pt = Auth::user()->id;
    
        $type_tache->update();

        Flashy::success("Tâche modifiée avec succès");
        return redirect()->back();
        //return redirect()->route('programme.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $type = PTBATache::find($id);
        $type->geler_pt= 1;
        $type->update();

        Flashy::success("Tâche supprimée avec succès");
        //return redirect()->route('type_activite.index');
        return redirect()->back();
    }
}
