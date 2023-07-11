<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\Region;
use App\Models\Parametrages\SousPrefecture;
use App\Models\Parametrages\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class VillageController extends Controller
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
        // $validator = Validator::make($request->all(),[
        //     'code_vil' => 'required|string',
        //     'nom_vil' => 'required|string',
        // ]);

        // if ($validator->fails()) {
        //     Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
        //     return redirect()->back();
        // }

        $produit = new Village();

        $produit->code_vil = $request->code_vil;
        $produit->nom_vil = $request->nom_vil ?? null;
        $produit->idspf_vil = $request->idspf_vil;
        $produit->logitude_vil = $request->logitude_vil;
        $produit->latitude_vil = $request->latitude_vil;
        $produit->homme_vil = $request->homme_vil;
        $produit->femme_vil = $request->femme_vil;
        $produit->menage_vil = $request->menage_vil;
        $produit->idusrcreation_vil = Auth::user()->id;

        $produit->save();

        Flashy::success("Village ajouté avec succès");

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

    public function edit(Village $partenaire)
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
    public function update(Request $request, Village $partenaire)
    {
        $request->validate([
            'code_vil' => 'required|string',
            'nom_vil' => 'required|string',
            'abrege_vil' => 'required|string',
            'couleur_vil' => 'required|string',
        ]);

        $partenaire->code_vil = $request->code_vil;
        $partenaire->nom_vil = $request->nom_vil ?? null;
        $partenaire->abrege_vil = $request->abrege_vil;
        $partenaire->couleur_vil = $request->couleur_vil;


        $partenaire->update();

        Flashy::success("Village modifié avec succès");

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
