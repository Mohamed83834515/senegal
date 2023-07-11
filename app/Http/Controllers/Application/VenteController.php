<?php

namespace App\Http\Controllers\Application;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Models\Application\Produit;
use App\Http\Controllers\Controller;
use App\Models\Application\Commande;
use Illuminate\Support\Facades\Auth;
use App\Models\Application\Versement;
use App\Models\Application\Partenaire;
use Illuminate\Support\Facades\Validator;
use App\Models\Application\StatutCommande;
use App\Models\Application\Produit_commande;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gestion-ventes.ventes.liste', [
            'ventes' => Commande::with([
                'partenaire',
                'statutCommandes' => function ($query) {
                    $query->orderBy("id_stc", "DESC");
                },
            ])->orderBy('id_cmd', 'DESC')->get(),
            'produits' => Produit::all(),
            'clients' => Partenaire::where('idtyp_ptn', '=', 2)->get()
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
        // dd($request);

        $validator = Validator::make($request->all(),[
            'existe' => 'required|string',
            'aPayer' => 'required|string',
            'client' =>  [Rule::requiredIf($request->existe == 'true'), 'numeric'],
            'nom' => [Rule::requiredIf($request->existe == 'false'), 'string'],
            'telephone' => [Rule::requiredIf($request->existe == 'false'), 'string'],
            'versement' => [Rule::requiredIf($request->aPayer == 'true'), 'numeric'],
            'date_livraison' => 'required|date',
            'produit' => 'required|array',
            'quantite' => 'required|array',
            'prix' => 'required|array',
        ]);

        if ($validator->fails()) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $clt = null;

            if ($request->existe == 'false') {
                $client = new Partenaire();
                $client->idtyp_ptn = 2;
                $client->libelle_ptn = $request->nom;
                $client->telephone_ptn = $request->telephone ?: null;
                $client->idusrcreation_ptn = Auth::user()->id;

                $client->save();

                $clt = $client->id_ptn;
            } else {
                $clt = $request->client;
            }
            
            $ventes = new Commande();
            $ventes->numero_cmd = $this->generateCommandeNumber();
            $ventes->idptn_cmd = $clt;
            $ventes->date_livraison_cmd = Carbon::parse($request->date_livraison);
            $ventes->idusrcreation_cmd = Auth::user()->id;

            $ventes->save();

            $total = 0;

            $count = 0;

            foreach ($request->produit as $produit) {
                $produitCommander = new Produit_commande();
                $produitCommander->idcmd_pcm = $ventes->id_cmd;
                $produitCommander->idpro_pcm = $request->produit[$count];
                $produitCommander->quantite_pcm = $request->quantite[$count];
                $produitCommander->prix_pcm = $request->prix[$count];
                $produitCommander->idusrcreation_pcm = Auth::user()->id;

                $produitCommander->save();

                $produit = Produit::where('id_pro', '=', $produitCommander->idpro_pcm)->first();

                $produit->quantite_pro = $produit->quantite_pro - $produitCommander->quantite_pcm;
                $produit->update();

                $total += $request->prix[$count]*$request->quantite[$count];

                $count++;
            }

            if($request->aPayer == 'true'){
                $versement = new Versement();
                $versement->idcmd_ver = $ventes->id_cmd;
                $versement->montant_ver = $request->versement;
                $versement->idusrcreation_ver = Auth::user()->id;

                $versement->save();

                $ventes->montant_payer_cmd = $versement->montant_ver;
            }

            $ventes->montant_cmd = $total;

            $ventes->update();

            // Mettre la commande au statut en attente
            $statut = new StatutCommande();
            $statut->idcmd_stc = $ventes->id_cmd;
            $statut->idsta_stc = 3; //En attente
            $statut->idusrcreation_stc = Auth::user()->id;
            $statut->save();

            DB::commit();

            Flashy::success("Vente ajoutée avec succès");
            
            return redirect()->route('vente.index');
            
        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $vente)
    {
        $vente = Commande::where('id_cmd', '=', $vente->id_cmd)
                ->with([
                    'partenaire', 'produitCommandes.produit',
                    'versements' => function ($query) {
                        $query->orderBy("id_ver", "DESC");
                    },
                    'statutCommandes' => function ($query) {
                        $query->orderBy("id_stc", "DESC")->limit(1);
                    },
                ])->first();

        return view('dashboard.gestion-ventes.ventes.show', [
            "vente" => $vente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $vente)
    {
        $vente->delete();

        Flashy::success("Vente supprimée avec succès");
        
        return redirect()->route('vente.index');
    }

    /**
     * generate Commande Number
     *
     * @return string
     */
    public function generateCommandeNumber() : string
    {
        
        $annee = date("Y");
        $mois = date("m");
        $code = env('CODE_COMMANDE');
        
        $nombreCommande = Commande::whereMonth("created_at", "=", $mois)
                                    ->whereYear('created_at', '=', $annee)
                                    ->count();
        $nombreCommande = str_pad($nombreCommande+1, 2, "0", STR_PAD_LEFT);

        $commandeNumber = "$code$annee$mois-$nombreCommande";

        return $commandeNumber;
    }

    /**
     * add versement to the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function ajouterVersement(Request $request, Commande $vente = null)
    {
        // dd($vente, $request);

        $validator = Validator::make($request->all(),[
            'versement' => 'required|numeric',
        ]);

        if ($validator->fails() || $vente == null) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $versement = new Versement();
            $versement->idcmd_ver = $vente->id_cmd;
            $versement->montant_ver = $request->versement;
            $versement->idusrcreation_ver = Auth::user()->id;
    
            $versement->save();
    
            $vente->montant_payer_cmd = $vente->montant_payer_cmd + $versement->montant_ver;
    
            $vente->save();
    
            DB::commit();

            Flashy::success("Versement ajouté avec succès");
    
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }
        
        $versement = new Versement();
        $versement->idcmd_ver = $vente->id_cmd;
        $versement->montant_ver = $request->versement;
        $versement->idusrcreation_ver = Auth::user()->id;

        $versement->save();

        $vente->montant_payer_cmd = $vente->montant_payer_cmd + $versement->montant_ver;

        $vente->save();

        Flashy::success("Versement ajouté avec succès");

        return redirect()->back();
    }

    /**
     * change statut of the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function livrer(Commande $vente = null)
    {
        if ($vente == null) {
            Flashy::error("Opération invalide veuillez réesssayer plus tard");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {
            StatutCommande::where('idcmd_stc', $vente->id_cmd)
                        ->delete();

            $statut = new StatutCommande();
            $statut->idcmd_stc = $vente->id_cmd;
            $statut->idsta_stc = 4; //Livré
            $statut->idusrcreation_stc = Auth::user()->id;
            $statut->save();

            DB::commit();

            Flashy::success("Vente ajoutée avec succès");

            return redirect()->back();
            
        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }
    }

    /**
     * print invoice of the specified resource.
     *
     * @param  \App\Models\Application\Commande  $vente
     * @return \Illuminate\Http\Response
     */
    public function imprimeFacture(Commande $vente = null)
    {
        $pdf = Pdf::loadView('dashboard.facture.facture-commande', [
            "vente" => $vente
        ]);
        
        $annee = date("Y");
        $mois = date("m");
        $jour = date("d");
        
        return $pdf->download($vente->numero_cmd."_$annee$mois$jour.pdf");

        // return view('dashboard.facture.facture-commande', [
        //     "vente" => $vente
        // ]);
    }
}
