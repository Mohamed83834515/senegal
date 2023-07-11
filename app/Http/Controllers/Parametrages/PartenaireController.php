<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\TypePartenaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = Partenaire::where('geler_pat', '=', 0)->get();

        return view("dashboard.parametrage.partenaires.liste", [

            "partenaires" => $partenaires,
            "types" => TypePartenaire::where('geler_tpt', '=', 0)->get(),

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
      /*   $validator = Validator::make($request->all(),[
            'code' => 'required|string',
            'sigle' => 'required|string',
            'definition' => 'required|string',
            'type' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:30000|nullable',
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        } */

        //dd($request->type);

            Partenaire::create([

                "code_pat" => $request->code,
                'sigle_pat' => $request->sigle ?? null,
                'definition_pat' => $request->definition,
                'type_pat' => $request->type,
                'contact_pat' => $request->contact,
                'email_pat' => $request->email,
                'logo_pat' => $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : null,

            ]);


       // $produit = new Partenaire();

         // $produit->quantite_pro = 0;
        // $produit->idusrcreation_pro = Auth::user()->id;

       // $produit->save();

        Flashy::success("Produit ajouté avec succès");

        return redirect()->route('partenaire.index');
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

    public function edit(Partenaire $partenaire)
    {
        return view('dashboard.parametrage.partenaires.edit', [
            'partenaire' => $partenaire,
            "types" => TypePartenaire::where('geler_tpt', '=', 0)->get(),
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
    public function update(Request $request, Partenaire $partenaire)
    {
        $request->validate([
            'code' => 'required|string',
            'sigle' => 'required|string',
            'definition' => 'required|string',
            'type' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:30000|nullable',
        ]);

        $partenaire->code_pat = $request->code;
        $partenaire->sigle_pat = $request->sigle ?? null;
        $partenaire->definition_pat = $request->definition;
        $partenaire->type_pat = $request->type;
        $partenaire->contact_pat = $request->contact;
        $partenaire->email_pat = $request->email;
        $partenaire->logo_pat = $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : null;

        $partenaire->update();

        Flashy::success("Partenaire modifié avec succès");

        return redirect()->route('partenaire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Partenaire $partenaire)
    {
        $partenaire->geler_pat = 1;
        $partenaire->update();

        Flashy::success("Partenaire supprimé avec succès");

        return redirect()->route('partenaire.index');
    }
}
