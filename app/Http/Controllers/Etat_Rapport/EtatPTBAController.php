<?php

namespace App\Http\Controllers\Etat_Rapport;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\FileUtilsController;
use App\Models\Parametrages\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Programmation\PTBA;
use App\Models\Programmation\PTBACout;
use App\Models\SuiviResultat\SuiviPTBA;
use App\Models\SuiviResultat\ObservationPTBA;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;


class EtatPTBAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.etat_rapport.etat_ptba.liste", [
            
        ]);
    }

    
  
    public function allAllPtba()
    {
        $ptba = PTBA::where([
            ['geler_ptba', '=', 0],
          //['projet_ptba','=',session('id_projet')]
          ])
          ->get();

        if (! $ptba) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Aucun ptba trouvé pour cet identifiant.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'ptba' => $ptba
        ]);
    }
    public function AllPartenaire()
    {
        $ptba = Partenaire::where('geler_pat', '=', 0)->get();

        if (! $ptba) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Aucun ptba trouvé pour cet identifiant.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'ptba' => $ptba
        ]);
    }
    public function AllBudget()
    {
       // $ptba = PTBACout::where('geler_pc', '=', 0)->get();
        $ptba = PTBACout::selectRaw('activite_pc, SUM(montant_pc) as somme')
                ->where('geler_pc', '=', 0)
               ->groupBy('activite_pc')
               ->get();

        if (! $ptba) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Aucun ptba trouvé pour cet identifiant.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'ptba' => $ptba
        ]);
    }
}
