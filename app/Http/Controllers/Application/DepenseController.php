<?php

namespace App\Http\Controllers\Application;

use Carbon\Carbon;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Models\Application\Depense;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.depense.liste", [
            "depenses" => Depense::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.depense.ajouter");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'motif' => 'required|string',
            'montant' => 'required|numeric',
            'date_depense' => 'required|date',
            'description' => 'string|nullable',
        ]);

        $depense = new Depense();

        $depense->motif_dep = $request->motif;
        $depense->montant_dep = $request->montant;
        $depense->date_depense_dep = Carbon::parse($request->date_depense);
        $depense->description_dep = $request->description;
        $depense->idusrcreation_dep = Auth::user()->id;
        $depense->save();

        Flashy::success("Dépense ajoutée avec succès");
        
        return redirect()->route('depense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(Depense $depense)
    {
        return view("dashboard.depense.show", [
            "depense" => $depense
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(Depense $depense)
    {
        return view("dashboard.depense.edit", [
            "depense" => $depense
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depense $depense)
    {
        $request->validate([
            'motif' => 'required|string',
            'montant' => 'required|numeric',
            'date_depense' => 'required|date',
            'description' => 'string|nullable',
        ]);

        $depense->motif_dep = $request->motif;
        $depense->montant_dep = $request->montant;
        $depense->date_depense_dep = Carbon::parse($request->date_depense);
        $depense->description_dep = $request->description;
        $depense->idusrcreation_dep = Auth::user()->id;

        $depense->update();

        Flashy::success("Dépense modifiée avec succès");
        
        return redirect()->route('depense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depense $depense)
    {
        $depense->delete();

        Flashy::success("Dépense supprimée avec succès");
        
        return redirect()->route('depense.index');
    }
}
