<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;
use App\Models\Documentation\Docs_dossier;
use App\Models\Documentation\Docs_fichier;
use App\Models\Documentation\Groupe_User;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Documentation\tache;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class DossierController extends Controller
{
    public function index() {
        $id=Auth::user()->id;

        $Dossier= DB::select("SELECT geller_doss,libelle_dossier, id_doss, designation, user_id FROM docs_dossier dd
        inner join groupe_users gu on gu.id=dd.id_grp_user
        inner join groupe_profils gp on gu.id=gp.groupe_id
        WHERE user_id=$id and geller_doss=0"
        // "SELECT geller_doss,libelle_dossier, id_doss, designation, user_id FROM groupe_profils gp
        // inner join groupe_users gu on gu.id=gp.groupe_id
        // inner join docs_dossier dd on dd.id_grp_user=gu.id
        // WHERE user_id=$id and geller_doss=0"
    );
        return view("dashboard.documentation.dossier.liste", compact('Dossier') ,[

            "groupes" => Groupe_User::all(),
        ]);
    }

    public function store (Request $request){

        Docs_dossier::create([
            'libelle_dossier'=>$request->libelle_dossier,
            'commentaire'=>$request->commentaire,
            'geller'=>0,
            'geller_doss'=>0,
            'id_grp_user'=>$request->id_grp_user,
        ]);

        Flashy::success("Dossier créer avec succès");

        return redirect()->route('dossier.index');
    }

    public function show($id){
            $fichier = DB::select("select libelle_fichier, fichier, responsable,id_fich,id_dossier,id_grp_user from docs_fichier df
            inner join docs_dossier dd on dd.id_doss=df.id_dossier
            inner join groupe_users gu on dd.id_grp_user=gu.id
            where id_dossier=$id");
            $doss = DB::select("select  responsable,id_doss,id_grp_user from  docs_dossier dd
            inner join groupe_users gu on dd.id_grp_user=gu.id
            where id_doss=$id");
            $users = DB::select("select  nom,user_id,responsable,id_doss,id_grp_user from  docs_dossier dd
            inner join groupe_users gu on dd.id_grp_user=gu.id
            inner join groupe_profils gp on gu.id=gp.groupe_id
            inner join users u on gp.user_id=u.id
            where id_doss=$id");
            $tache= DB::select("select th.id , responsable, dossier, libelle_tch, status, user_id from tache th inner join docs_dossier
             dd on th.dossier=dd.id_doss inner join groupe_users gu on dd.id_grp_user=gu.id where id_doss=$id" );

        return view("dashboard.documentation.tache.liste" ,[
            "fichier" =>$fichier,
            "doss" =>$doss,
            "users" =>$users,
            "user" =>$users,
            "tache" =>$tache,
            "dossier" => Docs_dossier::find($id),
        ]);

    }

    public function edit($id)
    {
        $dossier=Docs_dossier::find($id);
        return response()->json([
        'satuts'=>2000,
        'Dossier'=>$dossier,
        ]);
    }

    public function destroy(Docs_dossier $dossier)
    {
        $dossier->geller_doss = 1;
        $dossier->update();

        Flashy::success("dossier supprimée avec succès");

        return redirect()->route('dossier.index');
    }

    public function update(Request $request,  $id)
    {

            $dossier = Docs_dossier::find($id);
            $dossier->libelle_dossier = $request->libelle_dossier;
            $dossier->commentaire = $request->commentaire;
            $dossier->id_grp_user = $request->id_grp_user;
            $dossier->update();

            Flashy::success("Dossier modifiée avec succès");

            return redirect()->route('dossier.index');
    }

    public function add_fichier(Request $request){

        // $file = $request->file('fichier');
        // $filePath = $file->store('storage');
        $tach= tache::find($request->tache_id);

        Docs_fichier::create([
            'id_dossier'      =>$tach->dossier,
            'tache_id'        =>$request->tache_id,
            'libelle_fichier' => $request->libelle_fichier,
            // 'id_dossier'      => $request->id_dossier,
            'commentaire'     => "non commenté",
            'fichier'         =>$request->file('fichier') ? FileUtilsController::uploadFile($request->file('fichier'), "fichier", 'storage/') : null,
        ]);

        Flashy::success("fichier créer avec $tach->dossier succès");

        return redirect()->back();
    }

    public function download($filename)
    {
        $filePath = public_path("storage/{$filename}");

       return Response::download($filePath);
    }

}


