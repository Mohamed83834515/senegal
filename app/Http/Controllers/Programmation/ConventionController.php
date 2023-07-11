<?php

namespace App\Http\Controllers\Programmation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\TypeProgramme;
use App\Models\Programmation\Convention;
use App\Models\Programmation\ConventionActivite;
use App\Models\Programmation\ConventionResultat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ConventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.programmation.convention.liste", [
            "programmes" => Convention::where('geler_cvt', '=', 0)->get(),
            "type_programmes" => Partenaire::where('geler_pat', '=', 0)->get(),
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


        $convention = new Convention();

        $convention->code_cvt = $request->code;
        $convention->idpat_cvt = $request->type_partenaire;
        $convention->intitule_cvt = $request->intitule;
        $convention->reference_cvt = $request->ref;
        $convention->date_signature_cvt = $request->date_signature;
        $convention->montant_cvt = $request->montant;
        $convention->date_debut_cvt = $request->date_debut;
        $convention->date_fin_cvt = $request->date_fin;
        $convention->champ_app_cvt = $request->champ;
        $convention->idusrcreation_cvt = Auth::user()->id;
        // $produit->quantite_pro = 0;
        // $produit->idusrcreation_pro = Auth::user()->id;

        $convention->save();

        Flashy::success("convention ajouté avec succès");

        return redirect()->route('convention.index');
    }

    
    public function show(Convention $convention)
    {
        $allConvention= Convention::get();
        session(['id_convention' => $convention->id]);
        $convention = Convention::where('id', '=', $convention->id)->first();
        $conventionResultat= ConventionResultat::where([
            ['convention_cvr','=',$convention->id],
            ['geler_cvr','=',0],
            ])->get();
        $conventionActivite= ConventionActivite::where([
            ['description','=',$convention->id],
            ['geler_tac','=',0],
            ])->get();
      //  session(['id_convention' => $convention->id]);
        
        //$localites = Localite::with(['parent.parent'])->get();
        return view('dashboard.programmation.convention.show', [
            "convention" => $convention,
            "allConvention"=>$allConvention,
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "ConventionResultat"=>$conventionResultat,
            "ConventionActivite"=>$conventionActivite,
            "utilisateurs" => User::get(),
        ]);
    }
 
    /**
     * add versement to the specified resource.
     *
     * @param  \App\Models\Programmation\ConventionResultat  $vente
     * @return \Illuminate\Http\Response
     */
    public function ajouterConvention(Request $request, ConventionResultat $vente = null)
    {
       // dd($vente);

        $validator = Validator::make($request->all(),[
            'versement' => 'required|numeric',
        ]);

        if ($validator->fails() || $vente == null) {
            Flashy::error("Formulaire invalide, Réessayer en remplissant correctement les champs");
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $convention = new ConventionResultat();

            $convention->code_cvr = $request->code;
            $convention->convention_cvr = $vente->id;
            $convention->intitule_cvr = $request->intitule; 
            $convention->save();
            DB::commit();

            Flashy::success("Versement ajouté avec succès");
    
            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollback();

            Flashy::error("Une erreur est survenue, Veuillez réessauyer plutard");
            return redirect()->back();
        }
        
        $convention = new ConventionResultat();

        $convention->code_cvr = $request->code;
        $convention->convention_cvr = $vente->id;
        $convention->intitule_cvr = $request->intitule; 
        $convention->save();

        Flashy::success("Versement ajouté avec succès");

        return redirect()->back();
    }

    public function edit($ids)
    {
        $tache=Convention::find($ids);
        return response()->json([
        'satuts'=>2000,
        'convention'=>$tache,
        ]);
    }

    

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $convention = Convention::find($id);
        $convention->code_cvt = $request->code;
        $convention->idpat_cvt = $request->type_partenaire;
        $convention->intitule_cvt = $request->intitule;
        $convention->reference_cvt = $request->ref;
        $convention->date_signature_cvt = $request->date_signature;
        $convention->montant_cvt = $request->montant;
        $convention->date_debut_cvt = $request->date_debut;
        $convention->date_fin_cvt = $request->date_fin;
        $convention->champ_app_cvt = $request->champ;
        $convention->idusrcreation_cvt = Auth::user()->id;
    
        $convention->update();

        Flashy::success("convention modifiée avec succès");

        return redirect()->route('convention.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $type = Convention::find($id);
        $type->geler_cvt = 1;
        $type->update();

        Flashy::success("Convention supprimée avec succès");
        
        return redirect()->route('convention.index');
    }
}
