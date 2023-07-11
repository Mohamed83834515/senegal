<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $table = 'departement_dep';

    protected $fillable = [
        'code_dep',
        'idreg_dep',
        'nom_dep',
        'idusrcreation_dep',

    ];

    protected $primaryKey = 'id_dep';

    public function region()
    {
        return $this->belongsTo(Region::class,'idreg_dep', 'id_reg');
    }
    public function sousPrefecture()
    {
        return $this->hasMany(SousPrefecture::class,'iddep_spf', 'id_dep');
    }


}
