<?php

namespace App\Models\SuiviResultat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviIndicateurPP extends Model
{
    use HasFactory;

    protected $table = 'suivi_indicateur_pp';

    protected $fillable = [
        'id_indicateur_pp',
        'id_programme_pp',
        'id_projet_pp',
        'ugel_pp',
        'observation_pp',
        'lieu_pp',
        'annee_pp',
        'date_suivi_pp',
        'valeur_suivi_pp',
        'enregisrer_par_pp',
        'modifier_par_pp',
        'geler_pp',
        
    ];

    protected $primaryKey = 'id_pp';


}
