<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'region_reg';

    protected $fillable = [
        'code_reg',
        'nom_reg',
        'abrege_reg',
        'couleur_reg',
        'idusrcreation_reg',
        'idusrcreation_modif_reg'
    ];

    protected $primaryKey = 'id_reg';

    public function departements()
    {
        return $this->hasMany(Departement::class,'idreg_dep', 'id_reg');
    }


}
