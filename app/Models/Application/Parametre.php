<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use App\Models\Application\TypeParametre;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parametre extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_par';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parametre_par';

    /**
     * Get the typeParametre that owns the Parametre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeParametre(): BelongsTo
    {
        return $this->belongsTo(TypeParametre::class, 'idtyp_par');
    }
}
