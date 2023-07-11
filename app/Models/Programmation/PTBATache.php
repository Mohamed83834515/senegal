<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTBATache extends Model
{
    use HasFactory;

    protected $table = 'ptba_tache_pt';

    protected $fillable = [
        'code_pt',
        'type_activite_pt',
        'proportion_pt',
        'intitule_pt',
        'enregistrer_par_pt',
        'modifier_par_pt',
        'etat_pt',
        'geler_pt',
        'periode_pt',
        'valider_pt',
        'date_debut_pt',
        'date_fin_pt',
        'projet_pt',
        'lot_pt',
        'observation_pt',
        'date_suivi_pt',
        'responsable_pt',
    ];


    protected $primaryKey = 'id_pt';
    protected $casts = [
        'periode_pt' => 'array',
    ]; 
    public function user()
    {
        return $this->belongsTo(User::class,'responsable_pt','id');
    }
    //    public function convention()
    // {
    //     return $this->belongsTo(Convention::class,'convention_cvr','id_cvr');
    // }
   

}
