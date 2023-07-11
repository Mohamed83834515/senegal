<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeActivite extends Model
{
    use HasFactory;

    protected $table = 'type_activite_tpa';

    protected $fillable = [
        'code_tpa',
        'structure_tpa',
        'libelle_tpa', 
        'idusrcreation_tpa',
        'geler_tpa',
    ];


    protected $primaryKey = 'id_tpa';

        public function tache()
     {
         return $this->belongsTo(PTBATache::class,'type_activite_pt','id_tt');
     }

}
