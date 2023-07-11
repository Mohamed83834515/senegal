<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteIndicateur extends Model
{
    use HasFactory;

    protected $table = 'unite_indicateur_uti';

    protected $fillable = [
        'code_uti',
        'nom_uti',
    ];


    protected $primaryKey = 'id_uti';


}
