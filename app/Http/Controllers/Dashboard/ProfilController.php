<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Dashboard\Module;
use App\Models\Dashboard\Profil;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Dashboard\ProfilModule;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Administration.Profil.liste', [
            "profils" => Profil::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Administration.Profil.ajouter', [
            "modules" => Module::where('idsmo', '=', null)->with("sous_modules")->orderBy('id')->get()
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
        $request->validate([
            'libelle' => 'required|string',
            'commentaire' => 'string',
            'modules' => 'required|array',
        ]);

        $profil = Profil::create([
            'libelle' => $request->libelle,
            'commentaire' => $request->commentaire,
            'idusrcreation' => Auth::user()->id,
        ]);

        foreach ($request->modules as $current_module) {
            ProfilModule::create([
                "profil_id" => $profil->id,
                "module_id" => $current_module,
                'idusrcreation' => Auth::user()->id,
            ]);
        }

        Flashy::success("Profil ajouté avec succès");

        return redirect()->route('profil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        return view('dashboard.Administration.Profil.edit', [
            'profil' => $profil,
            "modules" => Module::where('idsmo', '=', null)->with("sous_modules")->orderBy('id')->get(),
            "profil_modules" => Arr::flatten(ProfilModule::where("profil_id", "=", $profil->id)->get('module_id')->toArray())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'libelle' => 'required|string',
            'commentaire' => 'string',
            'modules' => 'required|array',
        ]);

        $profil->update([
            'libelle' => $request->libelle,
            'commentaire' => $request->commentaire,
            'idusrcreation' => Auth::user()->id,
        ]);

        $lastProfilModules = ProfilModule::where("profil_id", "=", $profil->id)->get()->toArray();

        $moduleAjouter = $request->modules; //Tableau contenant les id des modules selectionnées
        for ($i=0; $i < count($lastProfilModules); $i++) {
            $element = $lastProfilModules[$i];

            // On récupère les modules n'existant pas parmi les anciens modules
            $moduleAjouter = Arr::where($moduleAjouter, function ($value) use ($element) {
                return $value != $element['module_id'];
            });
        }

        $moduleRetirer = $lastProfilModules; //Tableau contenant des instances de profilModule
        for ($i=0; $i < count($request->modules); $i++) {
            $element = $request->modules[$i];

            // On récupère les modules n'existant plus dans la nouvelle selection de modules
            $moduleRetirer = Arr::where($moduleRetirer, function ($value) use ($element) {
                return $value['module_id'] != $element;
            });
        }

        // dd($moduleRetirer, $moduleAjouter);

        foreach ($moduleAjouter as $current_module) {
            ProfilModule::create([
                "profil_id" => $profil->id,
                "module_id" => $current_module,
                'idusrcreation' => Auth::user()->id,
            ]);
        }

        foreach ($moduleRetirer as $current_module) {
            ProfilModule::destroy($current_module['id']);
        }

        Flashy::success("Profil modifié avec succès");

        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        $profil->delete();

        Flashy::success("Profil supprimé avec succès");

        return redirect()->route('profil.index');
    }
}
