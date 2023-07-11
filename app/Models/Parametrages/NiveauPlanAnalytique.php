<?php

namespace App\Models\Parametrages;


use App\Models\Parametrages\PlanAnalytique;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class NiveauPlanAnalytique extends Model
{
    use HasFactory;

    protected $table = 'niveau_plan_analytique_npa';

    protected $fillable = [
        'libelle_npa',
        'niveau_npa',
        'taille_npa',
        'idprj_npa',
        'idprg_npa',
        'geler_npa',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_npa';

    public function cadres()
    {
        return $this->hasMany(PlanAnalytique::class,'id_niv_pa');

    }
}
