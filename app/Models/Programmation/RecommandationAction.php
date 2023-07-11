<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommandationAction extends Model
{
    use HasFactory;

    protected $table = 'recommandation_action_rma';

    protected $fillable = [
        'resume_rma',  
        'intitule_rma',
        'code_rma',
        'montant_rma',
        'date_butoir_rma',
        'type_recommandation_rma',
        'structure_concerne_rma', 
    ];

    protected $casts = [
        'structure_concerne_rma' => 'array',
    ]; 
     protected $primaryKey = 'id_rma';

    //    public function partenaire()
    // {
    //     return $this->belongsTo(Partenaire::class,'idpat_rma','id_pat');
    // }
    // public function conventionResultats()
    // {
    //     return $this->hasMany(ConventionResultat::class,'convention_cvr', 'id');
    // }

}
