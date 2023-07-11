<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Application\Partenaire;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    const PARTENAIRE_ID = 1; // fournisseur

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = [];

        if (Auth::user()->profil_id == 1) {
            $fournisseurs = Partenaire::where('idtyp_ptn', '=', self::PARTENAIRE_ID)->get();
        } else {
            $fournisseurs = Partenaire::where('idtyp_ptn', '=', self::PARTENAIRE_ID)->where('empty1_ptn', '=', null)->get();
        }
        
        return view('dashboard.gestion-stock.fournisseurs.liste', [
            'fournisseurs' => $fournisseurs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nom' => 'required|string',
            'telephone' => 'string'
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $fournisseur = new Partenaire();
            $fournisseur->idtyp_ptn = self::PARTENAIRE_ID;
            $fournisseur->libelle_ptn = $request->nom;
            $fournisseur->telephone_ptn = $request->telephone ?: null;
            $fournisseur->idusrcreation_ptn = Auth::user()->id;

            $fournisseur->save();

            DB::commit();

            Flashy::success("Fournisseur ajouté avec succès");
            
            return redirect()->route('fournisseur.index');

        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Partenaire  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $fournisseur)
    {
        return view('dashboard.gestion-stock.fournisseurs.show', [
            'fournisseur' => $fournisseur
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Partenaire  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $fournisseur)
    {
        return view('dashboard.gestion-stock.fournisseurs.edit', [
            'fournisseur' => $fournisseur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Partenaire  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenaire $fournisseur)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required|string',
            'telephone' => 'string'
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        $fournisseur->libelle_ptn = $request->nom;
        $fournisseur->telephone_ptn = $request->telephone ?: null;
        $fournisseur->idusrcreation_ptn = Auth::user()->id;

        $fournisseur->save();

        Flashy::success("Fournisseur Modifié avec succès");
        
        return redirect()->route('fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Partenaire  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $fournisseur)
    {
        $fournisseur->delete();

        Flashy::success("Fournisseur supprimé avec succès");
        
        return redirect()->route('fournisseur.index');
    }
}
