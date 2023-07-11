<?php

namespace App\Models\SuiviResultat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviIndicateurPTBA extends Model
{
    use HasFactory;

    protected $table = 'suivi_indicateur_ptba_sip';

    protected $fillable = [
        'id_indicateur_sip',
        'id_activite_sip',
        'ugel_sip',
        'lieu_sip',
        'date_suivi_sip',
        'valeur_suivi_sip',
        'enregisrer_par_sip',
        'modifier_par_sip',
        'geler_sip',
        
    ];

    protected $primaryKey = 'id_sip';


}
