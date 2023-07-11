<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTBAIndicateur extends Model
{
    use HasFactory;

    protected $table = 'ptba_indicateur_pi';

    protected $fillable = [
        'code_pi',
        'activite_ptba_pi',
        'indicateur_produit_pi',
        'intitule_pi',
        'unite_pi',
        'valeur_cible_pi',
        'enregistrer_par_pi',
        'modifier_par_pi',
        'etat_pi',
        'geler_pi',
    ];


    protected $primaryKey = 'id_pi';
    
   

}
