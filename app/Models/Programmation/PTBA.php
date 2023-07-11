<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PTBA extends Model
{
    use HasFactory;

    protected $table = 'ptba';

    protected $fillable = [
            'annee_ptba',
            'code_activite_ptba',
            'intitule_activite_ptba',
            'debut_ptba',
            'structure_ptba',
            'partenaire_ptba',
            'projet_ptba',
            'zone_ptba',
            'localite_ptba',
            'observation_ptba',
            'type_activite_ptba',
            'enregistrer_par_ptba',
            'modifier_par_ptba',
            'etat_ptba',
            'geler_ptba',
            'trimestre1',
            'trimestre2',
            'trimestre3',
            'trimestre4',
    ];


    protected $primaryKey = 'id_ptba';
     protected $casts = [
        'debut_ptba' => 'array',
        'structure_ptba'=> 'array',
        'partenaire_ptba'=> 'array',
    ]; 
    //    public function partenaire()
    // {
    //     return $this->belongsTo(Partenaire::class,'partenaire_ptba','id_pat');
    // }
    public function user()
    {
        return $this->belongsTo(User::class,'responsable_pt','id');
    }
    // public function structure()
    // {
    //     return $this->belongsTo(Partenaire::class,'structure_ptba','id_pat');
    // }
     public function typeactivite()
    {
        return $this->belongsTo(TypeActivite::class,'type_activite_ptba', 'id_tpa');
    } 
   

}
