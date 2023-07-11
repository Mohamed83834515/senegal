<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePartenaire extends Model
{
    use HasFactory;

    protected $table = 'type_partenaire_tpt';

    protected $fillable = [
        'nom_tpt',
        'description_tpt',
    ];


    protected $primaryKey = 'id_tpt';

    public function partenaires()
    {
        return $this->hasMany(Partenaire::class,'type_pat','id_tpt');
    }

}
