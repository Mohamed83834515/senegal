<?php

namespace App\Http\Controllers\Cadre_Resultat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\CadreResultat\TypeCadreLogique;
use Illuminate\Support\Facades\Validator;
use MercurySeries\Flashy\Flashy;

class TypeCadreLogiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        if(isset($request->id_tcl)){

            $id=$request->id_tcl;
            $type=TypeCadreLogique::find($id);
            $type->type_tcl = $request->type_tcl;
            $type->update();
            Flashy::success("Type modifieé avec succès");

        }else{

            $type = new TypeCadreLogique();
            $type->type_tcl = $request->type_tcl;
            $type->save();
            Flashy::success("Type ajouté avec succès");
        }
        return redirect()->route('cadre_logique.index');

    }

    public function edit($ids)
    {
        $etat=1;
        $cadre=TypeCadreLogique::find($ids);
        return response()->json([
        'satuts'=>2000,
        'type'=>$cadre,
        ]);
       
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function show_unite_gestions($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cadre = TypeCadreLogique::find($id);
        $cadre->geler_tcl = 1;
        $cadre->update();

        Flashy::success("Type supprimé avec succès");

        return redirect()->route('cadre_logique.index');
    }
}
