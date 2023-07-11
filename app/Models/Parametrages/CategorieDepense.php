<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieDepense extends Model
{
    use HasFactory;

    protected $table = 'categorie_depense_cat';

    protected $fillable = [
        'code_cat',
        'nom_cat',
    ];


    protected $primaryKey = 'id_cat';


}
