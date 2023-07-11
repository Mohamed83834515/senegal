<?php

namespace App\Models\Programmation;

use App\Models\Parametrages\Partenaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConventionResultat extends Model
{
    use HasFactory;

    protected $table = 'convention_resultat';

    protected $fillable = [
        'code_cvr',
        'convention_cvr',
        'intitule_cvr',  
        'geler_cvr', 
    ];


    protected $primaryKey = 'id_cvr';

       public function convention()
    {
        return $this->belongsTo(Convention::class,'convention_cvr','id_cvr');
    }
    public function conventionactivites()
    {
        return $this->hasMany(ConventionActivite::class,'resultat_tac','id_cvr');
    }
}
