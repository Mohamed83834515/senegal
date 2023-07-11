<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;
use App\Models\Documentation\tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class tacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        tache::create([
            'user_id' => $request->user_id,
            'commentaire_tache' =>$request->commentaire_tache,
            'status'    =>$request->status,
            'libelle_tch' =>$request->libelle_tch,
            'dossier'   =>$request->dossier,
        ]);

        Flashy::success("tache supprimée avec succès");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $fichier = DB::select("select tache.user_id, libelle_fichier, df.created_at, status,fichier, libelle_tch, df.commentaire,id_fich,id_dossier
         from docs_fichier df
        inner join docs_dossier dd on df.id_dossier=dd.id_doss
        inner join tache on df.tache_id=tache.id
        where tache_id=$id  ORDER by id_fich desc");
        $tache = DB::select("select df.id, nom, user_id, libelle_tch, responsable
        from tache df
        inner join docs_dossier dd on df.dossier=dd.id_doss
        inner join groupe_users gu on dd.id_grp_user=gu.id
        inner join users ur on df.user_id=ur.id
        where df.id=$id");
        $asc=1;
        return view("dashboard.documentation.fichier.liste" ,[
            "fichier" =>$fichier,
            "tache" =>$tache,
            "id" => $asc,
            // "dossier" => Docs_dossier::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache=tache::find($id);

        return  response()->json([
        'satuts'=>2000,
        'tache'=>$tache,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tch=tache::find($id);

        $tch->user_id = $request->user_id;
        $tch->status = $request->status;
        $tch->libelle_tch = $request->libelle_tch;
        $tch->commentaire_tache = $request->commentaire_tache;

        $tch->update();
        Flashy::success("tache modifier avec succès");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $tache= tache::find($id);
        $tache->delete();

        Flashy::success("tache supprimer avec succès");

        return redirect()->back();
    }
}
