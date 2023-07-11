<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousPrefecture extends Model
{
    use HasFactory;

    protected $table = 'sous_prefecture_spf';

    protected $fillable = [
        'code_spf',
        'iddep_spf',
        'nom_spf',
        'idusrcreation_spf',

    ];

    protected $primaryKey = 'id_spf';

    public function departement()
    {
        return $this->belongsTo(Departement::class,'iddep_spf', 'id_dep');
    }

    public function villages()
    {
        return $this->hasMany(Village::class,'idspf_vil', 'id_spf');
    }

}
