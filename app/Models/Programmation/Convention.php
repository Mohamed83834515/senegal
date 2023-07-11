<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;

    protected $table = 'convention_cvt';

    protected $fillable = [
        'code_cvt',
        'idpat_cvt',
        'intitule_cvt',
        'reference_cvt',
        'montant_cvt',
        'idprj_cvt',
        'structure_cvt',
        'date_signature_cvt',
        'champ_app_cvt',
        'date_debut_cvt',
        'date_fin_cvt',
        'idusrcreation_cvt',
        'geler_cvt',
    ];


    protected $primaryKey = 'id';

       public function partenaire()
    {
        return $this->belongsTo(Partenaire::class,'idpat_cvt','id_pat');
    }
    public function conventionResultats()
    {
        return $this->hasMany(ConventionResultat::class,'convention_cvr', 'id');
    }

}
