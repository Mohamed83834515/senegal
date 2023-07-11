<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeParametre extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_typ';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_parametre_typ';

    /**
     * Get all of the parametres for the TypeParametre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parametres(): HasMany
    {
        return $this->hasMany(Parametre::class, 'idtyp_par', 'id_typ');
    }
}
