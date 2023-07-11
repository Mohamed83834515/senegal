<?php

namespace App\Models\CadreResultat;

use App\Models\Parametrages\UniteIndicateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class IndicateurCS extends Model
{
    use HasFactory;

    protected $table = 'indicateur_programme_iprg';

    protected $fillable = [
        'code_iprg',
        'intitule_iprg',
        'niveau_iprg',
        'intitule_cible_iprg',
        'valeur_cible_iprg',
        'annee_reference_iprg',
        'valeur_reference_iprg',
        'referentiel_iprg',
        'unite_iprg',
        'source_verification_iprg',
        'mode_calcul_iprg',
        'description_iprg',
        'projet_iprg',
        'echelle_iprg',
        'enregistrer_par_iprg',
        'page_iprg',
        'geler_iprg',
        'periodicite_calcul_iprg',
        'donnees_sources_iprg',
        'niveau_desagregation_iprg',
        'moyen_diffusion_iprg',
        'responsabilite_calcul_iprg',
        'methode_collecte_iprg',
        'diffusion_iprg'
    ];
    protected $primaryKey = 'id_iprg';
    protected $casts = [
        'intitule_cible_iprg' => 'array',
        'donnees_sources_iprg' => 'array',
        'diffusion_iprg'=> 'array',
        'responsabilite_calcul_iprg'=> 'array',
        'methode_collecte_iprg'=> 'array',
    ];

    public function unitemesure()
    {
        return $this->belongsTo(UniteIndicateur::class,'id_iprg','id_uti');
    }
}