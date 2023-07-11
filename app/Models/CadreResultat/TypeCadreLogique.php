<?php

namespace App\Models\CadreResultat;


use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class TypeCadreLogique extends Model
{
    use HasFactory;

    protected $table = 'type_cadre_logique_tcl';

    protected $fillable = [
        'type_tcl',
        'geler_tcl'
    ];
    protected $primaryKey = 'id_tcl';

    // public function categories()
    // {
    //     return $this->hasMany(NiveauCadreLogique::class,'id_type_ncls','id_ncl');
    // }
}
