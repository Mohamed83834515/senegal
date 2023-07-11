<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class NiveauLocalite extends Model
{
    use HasFactory;

    protected $table = 'niveau_localite_nvl';

    protected $fillable = [
        'libelle_nvl',
        'niveau',
        'taille_nvl',
        'geler_nvl',
    ];

    public $timestamps = false;
    
    protected $primaryKey = 'id_nvl';




    public function localites()
    {
        return $this->hasMany(Localite::class,'idniv_localite');
    }
}
