<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConventionActivite extends Model
{
    use HasFactory;

    protected $table = 'type_activite_convention_tac';

    protected $fillable = [
        'resultat_tac',
        'code_tac',
        'intitule_tac',  
        'idusrcreation_tac',
        'geler_tac',
    ];


    protected $primaryKey = 'id_tac';

       public function resultatconvention()
    {
        return $this->belongsTo(ConventionResultat::class,'resultat_tac','id_cvr');
    }

}
