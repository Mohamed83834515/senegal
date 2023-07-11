<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematique extends Model
{
    use HasFactory;

    protected $table = 'thematique_tmq';

    protected $fillable = [
        'nom_tmq',
        'decription_tmq',
        'photo_tmq',
    ];

    
    protected $primaryKey = 'id_tmq';


}
