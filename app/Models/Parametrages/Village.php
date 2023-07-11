<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = 'villages_vil';

    protected $fillable = [
        'code_spf',
        'iddep_spf',
        'nom_spf',
        'idusrcreation_spf',
        'logitude_vil',
        'latitude_vil',
        'homme_vil',
        'femme_vil',
        'jeune_vil',
        'menage_vil',

    ];

    protected $primaryKey = 'id_vil';

    public function sousPrefecture()
    {
        return $this->belongsTo(SousPrefecture::class,'idspf_vil', 'id_spf');
    }


}
