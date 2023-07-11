<?php

namespace App\Models\CadreResultat;


use App\Models\CadreResultat\NiveauCadreLogique;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class CadreLogique extends Model
{
    use HasFactory;

    protected $table = 'cadre_logique_cl';

    protected $fillable = [
        'code_cl',
        'projet_cl',
        'intitule_cl',
        'cout_cl',
        'id_parent_cl',
        'id_niv_cl',
        'geler_cl',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_cl';

    public function niveau()
    {
        return $this->belongsTo(NiveauCadreLogique::class, 'id_niv_cl','id_ncl');
    }

    public function enfant_categories()
    {
        return $this->hasMany(CadreLogique::class, 'id_parent_cl');
    }

    public function parent()
    {
        return $this->belongsTo(CadreLogique::class, 'id_parent_cl');
    }
   /* public function cadrelogique()
    {
        return $this->belongsTo(CadreLogique::class, 'id_cl');
    }*/
}
