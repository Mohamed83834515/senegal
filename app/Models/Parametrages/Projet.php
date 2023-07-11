<?php

namespace App\Models\Parametrages;

use App\Models\Parametrages\Partenaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $table = 'projet_prj';

    protected $fillable = [
        'code_prj',
        'sigle_prj',
        'intitule_prj',
        'duree_prj',
        'date_signature_prj',
        'date_demarrage_prj',
        'logo_prj',
        'actif_prj',
        'idprg_prj',
        'direction_lead_prj',
        'maitre_oeuvre_prj',
        'date_fin_prj',
        'financement_prj',
        'matrice_prj',
        'couverture_prj',
        'objectifs_prj',
        'type_projet_prj',
        'mode_execution_prj',
        'priorite_prj',
        'resultats_prj',
        'fichier_shape_file_prj',
        'couleur_prj',
        'zone_prj',
        'thematiques',
        'description_prj',
        'type_programme_prj',
        'geler_prj',
    ];


    protected $primaryKey = 'id_prj';
    // protected $casts = [
    //     'financement_prj' => 'array',
    //     'direction_lead_prj' => 'array',
    //     'matrice_prj' => 'array',
    //     'priorite_prj' => 'array',
    //     'thematiques' => 'array',
    //     'zone_prj'=>'array'
    // ];
    public function programme()
    {
        return $this->belongsTo(Programme::class,'idprg_prj','id_prg');
    }
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class,'financement_prj','id_pat');
    }

}
