<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProgramme extends Model
{
    use HasFactory;

    protected $table = 'type_programme_tpr';

    protected $fillable = [
        'nom_tpr',
        'description_tpr',
        'geler_tpr',
    ];


    protected $primaryKey = 'id_tpr';

    public function programmes()
    {
        return $this->hasMany(Programme::class,'type_programme_prg','id_tpr');
    }

}
