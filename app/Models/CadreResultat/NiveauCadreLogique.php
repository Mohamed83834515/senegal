<?php

namespace App\Models\CadreResultat;


use App\Models\CadreResultat\CadreLogique;
use App\Models\Parametrages\TypePartenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class NiveauCadreLogique extends Model
{
    use HasFactory;

    protected $table = 'niveau_cadre_logique_ncl';

    protected $fillable = [
        'libelle_ncl',
        'id_type_ncl',
        'niveau',
        'geler_ncl'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_ncl';


    public function categorie()
    {
        return $this->belongsTo(TypeCadreLogique::class,'id_type_ncl','id_tcl');
    }

    public function cadres()
    {
        return $this->hasMany(CadreLogique::class,'id_niv_cl');

    }
}
