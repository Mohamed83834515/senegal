<?php

namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;
use App\Models\Documentation\Groupe_User;
use App\Models\Documentation\groupe_profil;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MercurySeries\Flashy\Flashy;

class GroupeUser extends Controller
{
    public function index() {

        return view("dashboard.documentation.groupe_user.liste", [
            "groupe" => Groupe_User::all(),
            "user" =>    User::all(),
        ]);
    }

    public function store(Request $request){

        $groupe=Groupe_User::create([
            'nbr_user'=> count($request->user_id),
            'designation' => $request->designation,
            'commentaire'   => $request->commentaire,
            'responsable'   =>$request->responsable,
        ]);

        foreach ($request->user_id as $id_user){
            groupe_profil::create([
                'groupe_id' => $groupe->id,
                'user_id' => $id_user
            ]);
        }

        Flashy::success("Goupe créer avec succès");

        return redirect()->route('GroupeUser.index');
    }

    public function edit($id)
    {
        $groupe_u=Groupe_User::find($id);
        $groupe_p=DB::table('groupe_profils')
        ->join('users','users.id', '=', 'groupe_profils.user_id')
        ->select('users.nom as nom', 'groupe_profils.user_id as user_id')
        ->where('groupe_id',$id)->get();

        // $user_ii[]=DB::table('groupe_profils')
        // ->select('groupe_profils.user_id as user_id')
        // ->where('groupe_id',$id)->get();
        // $user1=implode('and id !=', $user_ii);
        //  $idh = explode("id !=" , $user_ii);
         $user=DB::select("SELECT * from users ");
        //  User::all();
         return response()->json([
        'status'=>200,
        'groupe_user'=>$groupe_u,
        'user'=>$user,
        // 'id_user'=>$user1,
        'groupe_profil'=>$groupe_p,
        ]);
    }

    public function destroy($id){

        $id=Groupe_User::find($id);

        $id->delete();

        Flashy::success("groupe supprimé avec succès");

        return redirect()->back();
    }
    public function update(Request $request,  $id)
    {

            $user_group = Groupe_User::find($id);
            $user_group->designation = $request->designation;
            $user_group->commentaire = $request->commentaire;
            $user_group->responsable = $request->responsable;
            $user_group->nbr_user = count($request->user_id);
            $lastprofil=groupe_profil::where("groupe_id", "=", $id)->get()->toArray();
            $profiladd = $request->user_id;
           // $moduleAjouter = $request->modules; Tableau contenant les id des modules selectionnées
            for ($i=0; $i < count($lastprofil); $i++) {
                $element = $lastprofil[$i];

                // On récupère les modules n'existant pas parmi les anciens modules
                $profiladd = Arr::where($profiladd, function ($value) use ($element) {
                    return $value != $element['user_id'];
                });
            }

            $profilRetirer = $lastprofil; //Tableau contenant des instances de profilModule
            for ($i=0; $i < count($request->user_id); $i++) {
                $element = $request->user_id[$i];

                // On récupère les modules n'existant plus dans la nouvelle selection de modules
                $profilRetirer = Arr::where($profilRetirer, function ($value) use ($element) {
                    return $value['user_id'] != $element;
                });
            }
            foreach ($profiladd as $current_module) {
                groupe_profil::create([
                    "groupe_id" => $id,
                    "user_id" => $current_module,
                ]);
            }

            foreach ($profilRetirer as $current_module) {
                groupe_profil::destroy($current_module['id']);
            }

            $user_group->update();

            Flashy::success("Groupe modifiée avec succès");

            return redirect()->route('GroupeUser.index');
    }
}
