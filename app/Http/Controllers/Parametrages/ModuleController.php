<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Dashboard\Module;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.parametrage.Module.liste', [
            "modules" => Module::with('parent_module')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.parametrage.Module.ajouter',[
            "modules" => Module::where('idsmo', '=', null)->orderBy('id', 'DESC')->get()
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
            'idsmo' => 'numeric',
            'libelle' => 'required|string',
            'lien' => 'required|string',
            'class' => 'string',
            'icone' => 'required|string',
        ]);

        Module::create([
            'idsmo' => $request->idsmo == 0 ? null : $request->idsmo,
            'libelle' => $request->libelle,
            'lien' => $request->lien,
            'class' => $request->class,
            'icone' => $request->icone,
            'idusrcreation' => Auth::user()->id,
        ]);

        Flashy::success("Module ajouté avec succès");

        return redirect()->route('module.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('dashboard.parametrage.Module.edit', [
            'module' => $module,
            "modules" => Module::where('idsmo', '=', null)->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'idsmo' => 'numeric',
            'libelle' => 'required|string',
            'lien' => 'required|string',
            'class' => 'string',
            'icone' => 'required|string',
        ]);

        $module->update([
            'idsmo' => $request->idsmo == 0 ? null : $request->idsmo,
            'libelle' => $request->libelle,
            'lien' => $request->lien,
            'class' => $request->class,
            'icone' => $request->icone,
            'idusrcreation' => Auth::user()->id,
        ]);

        Flashy::success("Module modifié avec succès");

        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        Flashy::success("Module supprimé avec succès");

        return redirect()->route('module.index');
    }
}
