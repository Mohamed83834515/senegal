<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\UniteIndicateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class UniteIndicateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /**  return view("dashboard.parametrage.autres.liste_fonction", [
         *   "fonctions" => fonction::all()
        *]);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $unite = new UniteIndicateur();

        $unite->code_uti = $request->code;
        $unite->nom_uti = $request->nom;


        $unite->save();

        Flashy::success("Unté ajoutée avec succès");

        return redirect()->route('autres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function edit($id)
    {
        $profils=UniteIndicateur::find($id);
        return response()->json([
        'satuts'=>2000,
        'Unite'=>$profils,
        ]);
    }

    public function update(Request $request,  $id)
    {

            $unite = UniteIndicateur::find($id);
            $unite->code_uti = $request->code;
            $unite->nom_uti = $request->nom;

            $unite->update();

            Flashy::success("Unité modifiée avec succès");

            return redirect()->route('autres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(UniteIndicateur $unite)
    {
        $unite->geler_uti = 1;
        $unite->update();

        Flashy::success("Unité supprimée avec succès");

        return redirect()->route('autres.index');
    }
}
