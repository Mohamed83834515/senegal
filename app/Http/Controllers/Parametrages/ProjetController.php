<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Parametrages\Partenaire;
use App\Models\Parametrages\Programme;
use App\Models\User;
use App\Models\Parametrages\Projet;
use App\Models\Parametrages\ProjetUser;
use App\Models\Parametrages\TypePartenaire;
use App\Models\Parametrages\Thematique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.parametrage.projets.liste", [

            "partenaires" => Projet::where('geler_prj','=',0)->orderBy('id_prj','DESC')->get(),
            "types" => Partenaire::where('geler_pat', '=', 0)->get(),
            "thematiques" => Thematique::where('geler_tmq', '=',0)->get(),
            "programmes"=> Programme::where('geler_prg','=',0)->get()

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

       // dd($request);

            Projet::create([

                "code_prj" => $request->code,
                'sigle_prj' => $request->sigle ,
                'intitule_prj' => $request->intitule_projet,
                'date_signature_prj' => $request->date_signature,  
                'intitule_prj' => $request->intitule_projet, 
                'date_fin_prj' => $request->date_fin,  
                'couverture_prj' => $request->couverture,  
              //  'priorite_prj' =>$request->priorite,     
                'idprg_prj'=> $request->type


            ]);


       // $produit = new Partenaire();

         // $produit->quantite_pro = 0;
        // $produit->idusrcreation_pro = Auth::user()->id;

       // $produit->save();

        Flashy::success("Produit ajouté avec succès");

        return redirect()->route('projet.index');
    }

    public function show(Projet $projet)
    {
        $projet = Projet::where('id_prj', '=', $projet->id_prj)->first();
        $projetUser= ProjetUser::where('idprj_pru','=',$projet->id_prj)->get();
      //  dd($projetUser);
         $us= User::all(); 
        return view('dashboard.parametrage.projets.show', [
            "projet" => $projet,
            "users" => $projetUser, 
            "partenaires" => Partenaire::where('geler_pat', '=', 0)->get(),
            "utilisateurs" => $us,
        ]);
    }

    public function edit($ids)
    {
        $cadre=Projet::find($ids);
        return response()->json([
        'satuts'=>2000,
        'projet'=>$cadre,
        ]);
        // return view('dashboard.parametrage.partenaires.edit', [
        //     'partenaire' => $partenaire,
        //     "types" => TypePartenaire::where('geler_tpt', '=', 0)->get(),
        // ]);
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
    public function projetAll()
    {
        $partenaires = Projet::all();

        return response()->json([
            'status' => 'success',
            'projets' => $partenaires
        ]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
        // $request->validate([
        //     'code' => 'required|string',
        //     'sigle' => 'required|string',
        //     'definition' => 'required|string',
        //     'type' => 'required|string',
        //     'image' => 'mimes:jpeg,png,jpg,gif,svg|max:30000|nullable',
        // ]);
        $partenaire=Projet::find($ids);

        $partenaire->code_prj = $request->code;
        $partenaire->sigle_prj = $request->sigle;
        $partenaire->intitule_prj = $request->intitule_projet;
        $partenaire->couverture_prj = $request->couverture;
        $partenaire->date_signature_prj = $request->date_signature;
        $partenaire->idprg_prj = $request->type;
//$partenaire->logo_prj = $request->file('image') ? FileUtilsController::uploadFile($request->file('image'), "produit", 'uploads/produits/') : null;

        $partenaire->update();

        Flashy::success("Projet modifié avec succès");

        return redirect()->route('projet.index');
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
