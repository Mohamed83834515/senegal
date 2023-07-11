<?php

namespace App\Http\Controllers\Application;

use Carbon\Carbon;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Models\Application\Rapport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RapportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.rapport.liste", [
            "rapports" => Rapport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.rapport.ajouter");
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
            'objet' => 'required|string',
            'date_reunion' => 'required|date',
            'description' => 'required|string',
        ]);

        $rapport = new Rapport();

        $rapport->objet_rap = $request->objet;
        $rapport->date_reunion_rap = Carbon::parse($request->date_reunion);
        $rapport->description_rap = $request->description;
        $rapport->idusrcreation_rap = Auth::user()->id;

        $rapport->save();

        Flashy::success("Rapport ajouté avec succès");
        
        return redirect()->route('rapport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        return view("dashboard.rapport.show", [
            "rapport" => $rapport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        return view("dashboard.rapport.edit", [
            "rapport" => $rapport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapport $rapport)
    {
        $request->validate([
            'objet' => 'required|string',
            'date_reunion' => 'required|date',
            'description' => 'required|string',
        ]);

        $rapport->objet_rap = $request->objet;
        $rapport->date_reunion_rap = Carbon::parse($request->date_reunion);
        $rapport->description_rap = $request->description;
        $rapport->idusrcreation_rap = Auth::user()->id;

        $rapport->update();

        Flashy::success("Rapport modifié avec succès");
        
        return redirect()->route('rapport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapport $rapport)
    {
        $rapport->delete();

        Flashy::success("Rapport supprimé avec succès");
        
        return redirect()->route('rapport.index');
    }
}
