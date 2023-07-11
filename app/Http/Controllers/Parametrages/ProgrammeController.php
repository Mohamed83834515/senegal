<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\TypeProgramme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.parametrage.programmes.liste", [
            "programmes" => Programme::all()->where('geler_prg', '=', 0),
            "type_programmes" => TypeProgramme::where('geler_tpr', '=', 0)->get(),
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


        $programme = new Programme();

        $programme->code_prg = $request->code;
        $programme->sigle_prg = $request->sigle ?? null;
        $programme->nom_prg = $request->nom;
        $programme->objectif_prg = $request->objectif;
        $programme->vision_prg = $request->vision;
        $programme->date_debut_prg = $request->date_debut;
        $programme->date_fin_prg = $request->date_fin;
        $programme->budget_estimatif_prg = $request->budget;
        $programme->type_programme_prg = $request->type;

        // $produit->quantite_pro = 0;
        // $produit->idusrcreation_pro = Auth::user()->id;

        $programme->save();

        Flashy::success("Programme ajouté avec succès");

        return redirect()->route('programme.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
            'partenaire' => $partenaire
        ]);
    }

    public function edit($ids)
    {
        $programme=Programme::find($ids);
        return response()->json([
        'satuts'=>2000,
        'programme'=>$programme,
        ]);
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

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
        $programme=Programme::find($ids);
       
        $programme->code_prg = $request->code;
        $programme->sigle_prg = $request->sigle ?? null;
        $programme->nom_prg = $request->nom;
        $programme->objectif_prg = $request->objectif;
        $programme->vision_prg = $request->vision;
        $programme->annee_debut_prg = $request->date_debut;
        $programme->annee_fin_prg = $request->date_fin;
        $programme->budget_estimatif_prg = $request->budget;
        $programme->type_programme_prg = $request->type;
    
        $programme->update();

        Flashy::success("Programme modifié avec succès");

        return redirect()->route('programme.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Programme $programme)
    {
        $programme->geler_prg = 1;
        $programme->update();

        Flashy::success("Type de programme supprimé avec succès");
        
        return redirect()->route('programme.index');
    }
}
