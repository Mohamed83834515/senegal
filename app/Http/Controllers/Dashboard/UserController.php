<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dashboard\Profil;
use App\Models\Parametrages\Fonction;
use MercurySeries\Flashy\Flashy;
use App\Http\Controllers\Controller;
use App\Models\Parametrages\Partenaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];

        if(Auth::user()->profil_id == 1){
            $users = User::orderBy('id', 'DESC')->with('profil')->get();
        }else {
            $users = User::where('profil_id', '<>', 1)->orderBy('id', 'DESC')->with('profil')->get();
        }

        return view('dashboard.Administration.Utilisateur.liste', [
            "profils" => Profil::all(),
            "fonctions"=> Fonction::all(),
            "partenaires" => Partenaire::all(),
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Administration.Utilisateur.ajouter',[
            "profils" => Profil::all(),
            "fonctions"=> Fonction::all(),
            "partenaires" => Partenaire::all(),
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
            'profil_id' => 'required|numeric',
            'structure_id' => 'numeric|nullable',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|string',
            'fonction' => 'required|string',
        ]);

        User::create([
            'profil_id' => $request->profil_id,
            'structure_id' => $request->structure_id,
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'titre' => $request->titre,
            'password' => Hash::make('12345'),
            'idusrcreation' => Auth::user()->id,
            'fonction_id' => $request->fonction,
        ]);

        Flashy::success("Utilisateur ajouté avec succès");

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($idss)
    {
        $profils=User::find($idss);
        return response()->json([
        'satuts'=>2000,
        'User'=>$profils,
        ]);
    }
    // public function edite(User $user)
    // {
    //     $profils = [];

    //     if(Auth::user()->profil_id == 1){
    //         $profils = Profil::all();
    //     }else {
    //         $profils = Profil::where('id', '<>', 1)->get();
    //     }

    //     return view('dashboard.Administration.Utilisateur.edit',[
    //         "profils" => $profils,
    //         "user" => $user,
    //         "fonctions"=> Fonction::all(),
    //         "partenaires" => Partenaire::all(),
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $idss)
    {
        $User = User::find($idss);
        $User->profil_id = $request->profil_id;
        $User->structure_id = $request->structure_id;
        $User->nom = $request->nom;
        $User->prenom = $request->prenom;
        $User->telephone = $request->telephone;
        $User->email = $request->email;
        $User->titre = $request->titre;
        $User->fonction_id = $request->fonction;
        $User->idusrcreation = Auth::user()->id;

        $User->update();

        Flashy::success("Utilisateur modifiée avec succès");

        return redirect()->route('user.index');
    }
    // public function updatee(Request $request, User $user)
    // {
    //     $request->validate([
    //         'profil_id' => 'numeric',
    //         'structure_id' => 'numeric|nullable',
    //         'nom' => 'required|string',
    //         'prenom' => 'required|string',
    //         'email' => 'required|string',
    //     ]);

    //     $user->update([
    //         'profil_id' => $request->profil_id,
    //         'structure_id' => $request->structure_id,
    //         'nom' => $request->nom,
    //         'telephone' => $request->telephone,
    //         'prenom' => $request->prenom,
    //         'email' => $request->email,
    //         'titre' => $request->titre,
    //         'idusrcreation' => Auth::user()->id,
    //         'fonction_id' => $request->fonction,
    //     ]);

    //     Flashy::success("Utilisateur modifié avec succès");

    //     return redirect()->route('user.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Flashy::success("Utilisateur supprimé avec succès");

        return redirect()->route('user.index');
    }

    /**
     * Reset the user password
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function reset_password(User $user)
    {
        $user->update([
            'password' => Hash::make('12345'),
            'first_connected_at' => null
        ]);

        Flashy::success("Mot de passe réinitialisé avec succès");

        return redirect()->route('user.index');
    }

    /**
     * Display the change password view.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function change_password_view()
    {
        if (Auth::user()->first_connected_at != null) {
            flashy::error('Votre mot de passe a déja été modifié');
            return redirect()->back();
        }
        return view('dashboard.auth.first-connect');
    }

    /**
     * Change the user password
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed'
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'password' => Hash::make($request->password),
            'first_connected_at' => now()
        ]);

        Flashy::success("Mot de passe modifié avec succès");

        return redirect()->route('dashboard.home');
    }
}
