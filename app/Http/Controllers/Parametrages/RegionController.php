<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.parametrage.region.liste", [
            "partenaires" => Region::all(),

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
        $validator = Validator::make($request->all(),[
            'code_reg' => 'required|string',
            'nom_reg' => 'required|string',
            'abrege_reg' => 'required|string',
            'couleur_reg' => 'required|string',
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        $produit = new Region();

        $produit->code_reg = $request->code_reg;
        $produit->nom_reg = $request->nom_reg ?? null;
        $produit->abrege_reg = $request->abrege_reg;
        $produit->couleur_reg = $request->couleur_reg;
        $produit->idusrcreation_reg = Auth::user()->id;

        $produit->save();

        Flashy::success("Region ajouté avec succès");

        return redirect()->route('localite.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenaire = Partenaire::find($id);

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

    public function edit(Region $partenaire)
    {
        return view('dashboard.parametrage.region.edit', [
            'partenaire' => $partenaire
        ]);
    }
    public function show_projets($id,$type)
    {
        $partenaire = Partenaire::find($id);

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
        $partenaires = Partenaire::whereJsonContains('type_partenaire',$type)->get();

        return response()->json([
            'status' => 'success',
            'partenaires' => $partenaires
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $partenaire)
    {
        $request->validate([
            'code_reg' => 'required|string',
            'nom_reg' => 'required|string',
            'abrege_reg' => 'required|string',
            'couleur_reg' => 'required|string',
        ]);

        $partenaire->code_reg = $request->code_reg;
        $partenaire->nom_reg = $request->nom_reg ?? null;
        $partenaire->abrege_reg = $request->abrege_reg;
        $partenaire->couleur_reg = $request->couleur_reg;


        $partenaire->update();

        Flashy::success("Region modifié avec succès");

        return redirect()->route('partenaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partenaire = Partenaire::find($id);

        if (! $partenaire) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Aucun partenaire trouvé pour cet identifiant.'
            ]);
        }

        $partenaire->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Suppression effectuée avec succès.'
        ]);
    }
}
