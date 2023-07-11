<?php

namespace App\Models\rapport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportDynamique extends Model
{
    use HasFactory;
    protected $table = 'rapport_dynamiques';

    protected $fillable = [
        'nom_rapport',
        'requette_rapport',
        'table_rapport',
        'colonne_rapport',
        'condition',
        'operateur',
        'valeur',
        'updated_at'
    ];


    protected $primaryKey = 'id_rapp';
}
