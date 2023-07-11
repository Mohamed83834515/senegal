<?php

namespace App\Models\Parametrages;


use App\Models\Parametrages\NiveauLocalite;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Localite extends Model
{
    use HasFactory;

    protected $table = 'localites_loc';

    protected $fillable = [
        'code_localite',
        'intitule_localite',
        'idniv_localite',
        'id_parent_localite',
        'code_localite_national',
        'abreviation_localite',
        'longitude_localite',
        'latitude_localite',
        'homme_localite',
        'femme_localite',
        'jeune_localite',
        'menage_localite',
        'geler_localite'
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_localite';
    protected $hidden = ['pivot'];

   

    public function niveau()
    {
        return $this->belongsTo(NiveauLocalite::class, 'idniv_localite','id_nvl');
    }

    public function enfant_localites()
    {
        return $this->hasMany(Localite::class, 'id_parent_localite');
    }

    public function parent()
    {
        return $this->belongsTo(Localite::class, 'id_parent_localite');
    }

    // public function ugl_conerces()
    // {
    //     return $this->hasMany(UniteGestion::class, 'chef_lieu_ugl');
    // }

    // public function unite_gestions()
    // {
    //     return $this->belongsToMany(UniteGestion::class, 't_unite_gestion_localite', 'id_localite','id_unite_gestion');
    // }
}
