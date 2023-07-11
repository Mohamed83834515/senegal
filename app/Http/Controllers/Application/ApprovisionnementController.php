<?php

namespace App\Http\Controllers\Application;

use Carbon\Carbon;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Models\Application\Produit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Application\Partenaire;
use Illuminate\Support\Facades\Validator;
use App\Models\Application\Approvisionnement;
use App\Models\Application\ProduitApprovisionnement;

class ApprovisionnementController extends Controller
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
        $approvisionnements = [];

        if (Auth::user()->profil_id == 1) {
            $fournisseurs = Partenaire::where('idtyp_ptn', '=', self::PARTENAIRE_ID)->get();
            $approvisionnements = Approvisionnement::with(['partenaire'])->orderBy('id_apv', 'DESC')->get();
        } else {
            $fournisseurs = Partenaire::where('idtyp_ptn', '=', self::PARTENAIRE_ID)->where('empty1_ptn', '=', null)->get();
            $approvisionnements = Approvisionnement::with(['partenaire'])->where('empty1_apv', '=', null)->orderBy('id_apv', 'DESC')->get();
        }

        return view('dashboard.gestion-stock.approvisionnements.liste', [
            'approvisionnements' => $approvisionnements,
            'produits' => Produit::all(),
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
        // dd($request);

        $validator = Validator::make($request->all(),[
            'fournisseur' => 'required|numeric',
            'date_reception' => 'required|date',
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

            $approvisionnement = new Approvisionnement();
            $approvisionnement->idptn_apv = $request->fournisseur;
            $approvisionnement->date_livraison_apv = Carbon::parse($request->date_reception);
            $approvisionnement->idusrcreation_apv = Auth::user()->id;

            $approvisionnement->save();

            $total = 0;

            $count = 0;

            foreach ($request->produit as $produit) {
                $produitApprovisionner = new ProduitApprovisionnement();
                $produitApprovisionner->idapv_pap = $approvisionnement->id_apv;
                $produitApprovisionner->idpro_pap = $request->produit[$count];
                $produitApprovisionner->quantite_pap = $request->quantite[$count];
                $produitApprovisionner->prix_pap = $request->prix[$count];
                $produitApprovisionner->idusrcreation_pap = Auth::user()->id;

                $produitApprovisionner->save();
                
                $produit = Produit::where('id_pro', '=', $produitApprovisionner->idpro_pap)->first();

                $produit->quantite_pro = $produit->quantite_pro + $produitApprovisionner->quantite_pap;
                $produit->update();

                $total += $request->prix[$count]*$request->quantite[$count];

                $count++;
            }

            $approvisionnement->montant_apv = $total;

            $approvisionnement->update();

            DB::commit();

            Flashy::success("Approvisionnement effectué avec succès");
            
            return redirect()->route('approvisionnement.index');
            
        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Approvisionnement $approvisionnement)
    {
        $approvisionnement = Approvisionnement::where('id_apv', '=', $approvisionnement->id_apv)
                            ->with(['partenaire', 'produitApprovisionnes.produit'])->first();

        return view('dashboard.gestion-stock.approvisionnements.show', [
            "approvisionnement" => $approvisionnement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Approvisionnement $approvisionnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application\Approvisionnement  $approvisionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approvisionnement $approvisionnement)
    {
        $approvisionnement->delete();

        Flashy::success("Approvisionnement supprimé avec succès");
        
        return redirect()->route('approvisionnement.index');
    }
}
