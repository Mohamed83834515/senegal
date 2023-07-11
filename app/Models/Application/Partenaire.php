<?php

namespace App\Models\Application;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partenaire extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idtyp_ptn',
        'libelle_ptn',
        'telephone_ptn',
        'emplacement_ptn',
        'empty1_ptn',
        'empty2_ptn',
        'empty3_ptn',
        'idusrcreation_ptn',
    ];
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_ptn';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partenaire_ptn';

    /**
     * Get the typePartenaire that owns the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typePartenaire(): BelongsTo
    {
        return $this->belongsTo(Parametre::class, 'idtyp_ptn', 'id_par');
    }

    /**
     * Get all of the commandes for the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class, 'idptn_cmd', 'id_ptn');
    }

    /**
     * Get the user that owns the Partenaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idusrcreation_ptn', 'id');
    }
}
