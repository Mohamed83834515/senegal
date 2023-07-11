<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;

    protected $table = 'fonction_fnct';

    protected $fillable = [
        'nom_fnct',
        'decription_fnct',
        'agence_fnct',
    ];


    protected $primaryKey = 'id_fnct';


}
