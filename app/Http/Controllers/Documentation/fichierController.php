<?php


namespace App\Http\Controllers\Documentation;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Documentation\Docs_fichier;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Utilities\FileUtilsController;
use MercurySeries\Flashy\Flashy;

class fichierController extends Controller
{
    public function index() {

        return view("dashboard.documentation.fichier.liste", [
            "Dossier" => Docs_fichier::all()
        ]);

    }
    public function download($filename)
    {
        $filePath = public_path("storage/{$filename}");

       return \Response::download($filePath);
    }
    public function destroy($id){
        $file= Docs_fichier::find($id);
        unlink('storage/'.$file->fichier);
        $file->delete();

        Flashy::success("fichier supprimer avec succès");

        return redirect()->back();
    }
    public function edit($id)
    {
        $fichier=Docs_fichier::find($id);
        return response()->json([
        'satuts'=>2000,
        'Fichier'=>$fichier,
        ]);
    }
    public function update(Request $request,  $id)
    {
        $fich=Docs_fichier::find($id);

        $fich->libelle_fichier=$request->libelle_fichier;
        $fich->commentaire=$request->commentaire;

        $fich->update();
        Flashy::success("fichier modifier avec succès");

        return redirect()->back();
    }
    public function updates(Request $request,  $id)
    {
        $fich=Docs_fichier::find($id);
        // unlink('storage/'.$fich->fichier);

        $fich->fichier=$request->file('fichier')? FileUtilsController::uploadFile($request->file('fichier'), "fichier", 'storage/') : null;

        $fich->update();
        Flashy::success("fichier modifier avec succès");

        return redirect()->back();
    }
}
