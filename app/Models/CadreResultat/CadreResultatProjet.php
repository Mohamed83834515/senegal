<?php

namespace App\Models\CadreResultat;


use App\Models\CadreResultat\NiveauCadreResultatProjet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class CadreResultatProjet extends Model
{
    use HasFactory;

    protected $table = 'cadre_resultat_projet_crp';

    protected $fillable = [
        'projet_crp',
            'code_crp',
            'intitule_crp',
            'abge_crp',
            'id_niv_crp',
            'id_parent_crp',
            'liaison_crp',
            'type_resultat_crp',
            'budget_activite_crp',
            'categorie_depense_crp',
            'commentaire_activite_crp',
            'geler_crp',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_crp';

    public function niveau()
    {
        return $this->belongsTo(NiveauCadreResultatProjet::class, 'id_niv_crp','id_ncrp');
    }

    public function enfant_categories()
    {
        return $this->hasMany(CadreResultatProjet::class, 'id_parent_crp');
    }

    public function parent()
    {
        return $this->belongsTo(CadreResultatProjet::class, 'id_parent_crp');
    }
    public function cadrelogique()
    {
        return $this->belongsTo(CadreLogique::class, 'liaison_crp','id_cl');
    }
}
