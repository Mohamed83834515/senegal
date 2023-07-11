<?php

namespace App\Http\Controllers\Parametrages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 
use App\Models\Parametrages\ProjetUser;     
use App\Models\Parametrages\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class ProjetUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProjetsUsers = ProjetUser::where('geler_pat', '=', 0)->get();

        return view("dashboard.parametrage.ProjetsUsers.liste", [

            "ProjetsUsers" => $ProjetsUsers,
            "types" => ProjetUser::where('geler_tpt', '=', 0)->get(),

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
       // dd($request->user);
 
        $ProjetsUsers = ProjetUser::find($request->projet);
        
        for($i=0;$i<=count($request->user)-1;$i++)
        {
          //  dd($request->user[$i]);
           
            $users = DB::table('projets_users_pru')
            ->where([
                ['idprj_pru', '=', $request->projet],
                ['iduser_pru', '=' , $request->user[$i]]
            ]) ->get();
           // dd($users);
           if($users->isEmpty())
           {
            ProjetUser::create([

                "idprj_pru" => $request->projet,
                'iduser_pru' => $request->user[$i],

                ]);
           }
             Flashy::success("Utilisateurs  ajouté avec succès");
      
        }
       
   

      

        return redirect()->back();
    }

   
   



     
}
