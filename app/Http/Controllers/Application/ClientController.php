<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Models\Application\Commande;
use Illuminate\Support\Facades\Auth;
use App\Models\Application\Partenaire;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    const PARTENAIRE_ID = 2; // Client

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gestion-ventes.clients.liste', [
            'clients' => Partenaire::where('idtyp_ptn', '=', self::PARTENAIRE_ID)->get()
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

        $client = new Partenaire();
        $client->idtyp_ptn = self::PARTENAIRE_ID;
        $client->libelle_ptn = $request->nom;
        $client->telephone_ptn = $request->telephone ?: null;
        $client->idusrcreation_ptn = Auth::user()->id;

        $client->save();

        Flashy::success("Client ajouté avec succès");
        
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Partenaire  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Partenaire $client)
    {
        $client = Partenaire::where('id_ptn', '=', $client->id_ptn)->first();

        $commandeReglees = Commande::where("idptn_cmd", "=", $client->id_ptn)->whereColumn('montant_payer_cmd', '>=', 'montant_cmd')->with([
            'produitCommandes.produit',
            'statutCommandes' => function ($query) {
                $query->orderBy("id_stc", "DESC");
            },
        ])->get();

        $commandeNonReglees = Commande::where("idptn_cmd", "=", $client->id_ptn)->whereColumn('montant_payer_cmd', '<', 'montant_cmd')->with([
            'produitCommandes.produit',
            'statutCommandes' => function ($query) {
                $query->orderBy("id_stc", "DESC");
            },
        ])->get();
        
        return view('dashboard.gestion-ventes.clients.show', [
            'client' => $client,
            "commandeReglees" => $commandeReglees,
            "commandeNonReglees" => $commandeNonReglees,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Partenaire  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Partenaire $client)
    {
        return view('dashboard.gestion-ventes.clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Partenaire  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partenaire $client)
    {
        $validator = Validator::make($request->all(),[
            'nom' => 'required|string',
            'telephone' => 'string'
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        $client->libelle_ptn = $request->nom;
        $client->telephone_ptn = $request->telephone ?: null;
        $client->idusrcreation_ptn = Auth::user()->id;

        $client->save();

        Flashy::success("Client Modifié avec succès");
        
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Partenaire  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partenaire $client)
    {
        $client->delete();

        Flashy::success("Client supprimé avec succès");
        
        return redirect()->route('client.index');
    }

    /**
     * print invoice of the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function imprimeFacture(Partenaire $client)
    {
        $client = Partenaire::where('id_ptn', '=', $client->id_ptn)->first();

        $commandeReglees = Commande::where("idptn_cmd", "=", $client->id_ptn)->whereColumn('montant_payer_cmd', '>=', 'montant_cmd')->with([
            'produitCommandes.produit',
            'statutCommandes' => function ($query) {
                $query->orderBy("id_stc", "DESC");
            },
        ])->get();

        $commandeNonReglees = Commande::where("idptn_cmd", "=", $client->id_ptn)->whereColumn('montant_payer_cmd', '<', 'montant_cmd')->with([
            'produitCommandes.produit',
            'statutCommandes' => function ($query) {
                $query->orderBy("id_stc", "DESC");
            },
        ])->get();
        
        $pdf = Pdf::loadView('dashboard.facture.facture-client', [
            'client' => $client,
            "commandeReglees" => $commandeReglees,
            "commandeNonReglees" => $commandeNonReglees,
        ]);

                
        $annee = date("Y");
        $mois = date("m");
        $jour = date("d");
        
        return $pdf->download($client->libelle_ptn."_$annee$mois$jour.pdf");

        // return view('dashboard.facture.facture-commande', [
        //     "vente" => $vente
        // ]);
    }
}
