<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTBACout extends Model
{
    use HasFactory;

    protected $table = 'ptba_cout_pc';

    protected $fillable = [
        'activite_pc',
        'bailleur_pc',
        'structure_pc',
        'montant_pc',
        'observation_pc',
        'enregistrer_par_pc',
        'modifier_par_pc',
        'etat_pc',
        'geler_pc',
    ];


    protected $primaryKey = 'id_pc';
   
   

}
