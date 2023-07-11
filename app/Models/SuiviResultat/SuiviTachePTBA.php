<?php

namespace App\Models\SuiviResultat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    use App\Models\Parametrages\Partenaire;
use App\Models\Programmation\PTBATache;
use App\Models\User;

class SuiviTachePTBA extends Model
{
    use HasFactory;

    protected $table = 'suivi_tache_ptba_stp';

    protected $fillable = [
        
        'ugl_stp',
        'proportion_stp',
        'valide_stp',
        'projet_stp',
        'observation_stp',
        'lot_stp',
        'source_stp',
        'id_tache_stp',
        'id_ptba_stp',
        'date_debut_stp',
        'date_fin_stp',
        'responsable_stp',
        'date_suivi_stp',
        'enregisrer_par_stp',
        'modifier_par_stp',
    ];

    protected $primaryKey = 'id_stp';

    public function tache()
    {
        return $this->belongsTo(PTBATache::class,'id_tache_stp','id_pt');
    }
}
