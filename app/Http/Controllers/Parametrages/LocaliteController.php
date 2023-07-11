<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Localite;
use App\Models\Parametrages\NiveauLocalite;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class LocaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statut=0;
        $id=1;
        $cadr= NiveauLocalite::where([
            ['niveau','=',$id],
            ['geler_nvl','=',0]
            ])->first();
        $localites = Localite::where('geler_localite', '=' , 0)->get();
        $nivo= NiveauLocalite::where('niveau','=',$id)->first();
        $localiteByNiveau= Localite::where('idniv_localite', '=' , $nivo->id_niv)->get();
        $groupby = Localite::groupBy('idniv_localite');
        $niveau_localites =NiveauLocalite::where('geler_nvl', '=' , 0)->get();
        $niveauOne = NiveauLocalite::where([
            ['geler_nvl','=',0],
            ['niveau', '=', 1]
            ])->first();
        return view("dashboard.parametrage.region.liste", [
            "localites" => $localites,
            "niveau_localites" => $niveau_localites,
            "PremierNiveau" => $niveauOne,
            "niveau" => NiveauLocalite::where('geler_nvl', '=' , 0)->get(),
            "groupby"=>$groupby,
            "LocaliteByNiveau" => $localiteByNiveau,
            "id"=>$id,
            "cadr"=>$cadr,
            "categorie"=>$niveau_localites,
            "statut"=>$statut,
        ]);
        // return response()->json([
        //     'status' => 'success',
        //     'localites' => $localites
        // ]);
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
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }
        $nivo= NiveauLocalite::where([
            ['niveau','=',$request->id_niveau],
            ['geler_nvl','=',0],
            ])->first();
        //dd($nivo->id_nvl);

        $produit = new Localite();

        $produit->code_localite = $request->code_reg;
        $produit->intitule_localite = $request->nom_reg ?? null;
        $produit->abreviation_localite = $request->abrege_reg;
        $produit->code_localite_national = $request->couleur_reg;
        $produit->idniv_localite = $request->id_niveau;
        $produit->id_parent_localite = $request->parent;
        // $produit->idusrcreation_reg = Auth::user()->id;

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
        $cadr= NiveauLocalite::where([
            ['niveau','=',$id],
            ['geler_nvl','=',0]
            ])->first();

        $statut=1;
        $num=$id;
        $lib= $num-1;
        $localites = Localite::where('geler_localite', '=' , 0)->with(['parent.parent'])->get();
        $PremierNiveau = NiveauLocalite::where([
            ['geler_nvl','=',0],
            ['niveau', '=', $id]
            ])->first();
        $Avant = NiveauLocalite::where([
            ['geler_nvl','=',0],
            ['niveau', '=', $lib]
            ])->first();
            //dd($Avant);
        $localiteByNiveau= Localite::where('idniv_localite', '=' , $id);
        $niveau_localites =NiveauLocalite::where('geler_nvl', '=' , 0)->get();

        return view("dashboard.parametrage.region.liste", [
            "localites" => $localites,
            "niveau_localites" => $niveau_localites,
            "PremierNiveau" => $PremierNiveau,
            "niveau" => NiveauLocalite::where('geler_nvl', '=' , 0)->get(),
            "LocaliteByNiveau" => $localiteByNiveau,
            "Avant" => $Avant,
            "id"=>$num,
            "cadr"=>$cadr,
            "categorie"=>$niveau_localites,
            "statut"=>$statut,
        ]);
    }

    public function edit($ids)
    {
        $etat=1;
        $cadre=Localite::find($ids);
        return response()->json([
        'satuts'=>2000,
        'localite'=>$cadre,
        ]);


    }

    public function update(Request $request, $id)
    {
        $produit=Localite::find($id);
        $produit->code_localite = $request->code_reg;
        $produit->intitule_localite = $request->nom_reg ?? null;
        $produit->abreviation_localite = $request->abrege_reg;
        $produit->code_localite_national = $request->couleur_reg;
        $produit->idniv_localite = $request->id_niveau;
        $produit->id_parent_localite = $request->parent;
        $produit->update();

        Flashy::success("Localité modifiée avec succès");

        return redirect()->route('localite.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy( $id)
    {
        $cadre = Localite::find($id);
        $cadre->geler_localite = 1;
        $cadre->update();

        Flashy::success("localité supprimée avec succès");

        return redirect()->route('localite.index');
    }
}
