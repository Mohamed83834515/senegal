<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $table = 'programme_prg';

    protected $fillable = [
        'code_prg',
        'sigle_prg',
        'nom_prg',
        'vision_prg',
        'objectif_prg',
        'date_debut_prg',
        'date_fin_prg',
        'annee_debut_prg',
        'annee_fin_prg',
        'budget_estimatif_prg',
        'type_programme_prg',
    ];


    protected $primaryKey = 'id_prg';
    public function typeprogramme()
    {
        return $this->belongsTo(typeprogramme::class,'type_programme_prg','id_tpr');
    }

}
