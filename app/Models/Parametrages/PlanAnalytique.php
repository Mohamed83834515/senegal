<?php

namespace App\Models\Parametrages;


use App\Models\Parametrages\NiveauPlanAnalytique;
use App\Models\CadreResultat\CadreLogique;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PlanAnalytique extends Model
{
    use HasFactory;

    protected $table = 'plan_analytique_pa';

    protected $fillable = [
        'structure_pa',
        'projet_pa',
        'code_pa',
        'code_cor_pa',
        'intitule_pa',
        'id_niv_pa',
        'id_parent_pa',
        'id_personne_pa',
        'geler_pa',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_pa';

    public function niveau()
    {
        return $this->belongsTo(NiveauPlanAnalytique::class, 'id_niv_pa','id_npa');
    }

    public function enfant_categories()
    {
        return $this->hasMany(PlanAnalytique::class, 'id_parent_pa');
    }

    public function parent()
    {
        return $this->belongsTo(PlanAnalytique::class, 'id_parent_pa');
    }
   /*  public function cadrelogique()
    {
        return $this->belongsTo(CadreLogique::class, 'liaison_crp','id_cl');
    } */
}
