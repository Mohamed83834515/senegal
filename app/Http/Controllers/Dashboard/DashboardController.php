<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application\Produit;
use App\Models\Parametrages\Programme;
use App\Models\Parametrages\Projet;
use App\Models\Parametrages\ProjetUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class DashboardController extends Controller
{
    public function home()
    {

        $id=Auth::user()->id;
        $projets = DB::table('projet_prj')
        ->join('projets_users_pru', 'projet_prj.id_prj', '=', 'projets_users_pru.idprj_pru')
        ->join('programme_prg', 'projet_prj.idprg_prj', '=', 'programme_prg.id_prg')
        ->where('projets_users_pru.iduser_pru', '=', $id)
        ->select('projet_prj.*','programme_prg.*')
        ->get();
         $programmes= Programme::where('geler_prg', '=', 0)->get();
         session(['programmes'=>$programmes]);
        // dd(session('programmes'));
      session(['projetuser' => $projets]);
      $premier=session('projetuser')->first();
      $project= Projet::where('geler_prj', '=', 0)->get();
      session(['project' =>  $project]); 
      
      $programmedefaut= Programme::where('geler_prg','=',0)->first();
      session(['programmedefaut' => $programmedefaut]);
      $idone= $premier->id_prg;
        session(['idproj'=> $idone]);
      session(['AllProjets' => $premier]);
 
      

      

        return view("dashboard.Accueil.welcome", [
            "produits" => Produit::all(),
            "project" => Projet::get(),
            "programmes"=>$programmes,
            "idone" => $idone,
            
        ]);
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($idp)
    { 
      

         session(['id_programme' => $idp]);
       //  dd(session('id_programme'));
       //  session()->forget('id_projet');
         return redirect()->back();
      
    }
      
    public function showProjet($idprojet)
    { 
      // dd($idprojet);
        
         session(['id_projet' => $idprojet]);
        // session()->forget('id_projet');
         //dd(session('id_projet'));
        return redirect()->back();
      
    }
}
