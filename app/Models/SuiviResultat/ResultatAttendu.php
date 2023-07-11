<?php

namespace App\Models\SuiviResultat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatAttendu extends Model
{
    use HasFactory;

    protected $table = 'recommandation_rc';

    protected $fillable = [
        'code_activite_rc',
        'intitule_rc',
        'reference_rc',
        'montant_rc',
        'projet_rc',
        'partenaires_rc',
        'region_concerne_rc',
        'objectif_rc',
        'debut_rc',
        'fin_rc',
        'enregistrer_par_rc',
        'modifier_par_rc',
        'etat_rc',
        'geler_rc',
    ];

    protected $primaryKey = 'id_rc';


}
