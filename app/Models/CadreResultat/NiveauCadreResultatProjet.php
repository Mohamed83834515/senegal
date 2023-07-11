<?php

namespace App\Models\CadreResultat;


use App\Models\CadreResultat\CadreResultatProjet;
use App\Models\Parametrages\TypePartenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class NiveauCadreResultatProjet extends Model
{
    use HasFactory;

    protected $table = 'niveau_cadre_resultat_projet_ncrp';

    protected $fillable = [
        'libelle_ncrp',
        'niveau',
        'geler_ncrp',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_ncrp';

    public function cadres()
    {
        return $this->hasMany(CadreResultatProjet::class,'id_niv_crp');

    }
}
