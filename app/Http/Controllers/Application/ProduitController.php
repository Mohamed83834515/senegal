<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Models\Application\Produit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Utilities\FileUtilsController;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.parametrage.produits.liste", [
            "produits" => Produit::all()
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
            'description' => 'string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:30000|nullable',
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        $produit = new Produit();

        $produit->libelle_pro = $request->nom;
        $produit->description_pro = $request->description ?? null;
        $produit->photo_pro = $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : null;
        $produit->quantite_pro = 0;
        $produit->idusrcreation_pro = Auth::user()->id;

        $produit->save();

        Flashy::success("Produit ajouté avec succès");
        
        return redirect()->route('produit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        return view('dashboard.parametrage.produits.edit', [
            'produit' => $produit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string',
            'description' => 'string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:30000|nullable',
        ]);

        $produit->libelle_pro = $request->nom;
        $produit->description_pro = $request->description ?? null;
        $produit->photo_pro = $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : $produit->photo_pro;
        $produit->idusrcreation_pro = Auth::user()->id;

        $produit->update();

        Flashy::success("Produit ajouté avec succès");
        
        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();

        Flashy::success("Produit supprimé avec succès");
        
        return redirect()->route('produit.index');
    }
}
