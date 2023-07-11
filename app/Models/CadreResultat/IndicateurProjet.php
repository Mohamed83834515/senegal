<?php

namespace App\Models\CadreResultat;

use App\Models\Parametrages\UniteIndicateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class IndicateurProjet extends Model
{
    use HasFactory;

    protected $table = 'indicateur_projet_iprj';

    protected $fillable = [
        'niveau_iprj',
        'liaison_prg_iprj',
        'code_indicateur_iprj',
        'code_iprj',
        'intitule_iprj',
        'unite_iprj',
        'intitule_cible_iprj',
        'valeur_cible_iprj',
        'valeur_cible_rmp_iprj',
        'intitule_reference_iprj',
        'annee_reference_iprj',
        'valeur_reference_iprj',
        'periodicite_iprj',
        'source_verification_iprj',
        'fonction_agregat_iprj',
        'referentiel_iprj',
        'typologie_iprj',
        'responsable_iprj',
        'fournisseur_iprj',
        'description_iprj',
        'echelle_iprj',
        'mode_suivi_iprj',
        'categorie_indicateur_iprj',
        'paccueil',
        'projet_iprj',
        'enregistrer_par_iprj',
        'geler_iprj',
    ];
    protected $primaryKey = 'id_iprj';


    public function unitemesure()
    {
        return $this->belongsTo(UniteIndicateur::class,'id_iprj','id_uti');
    }
}