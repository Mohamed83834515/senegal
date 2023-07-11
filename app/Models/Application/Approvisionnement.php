<?php

namespace App\Models\Application;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approvisionnement extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_apv';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'approvisionnement_apv';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_livraison_apv' => 'date',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Get all of the produitCommandes for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produitApprovisionnes(): HasMany
    {
        return $this->hasMany(ProduitApprovisionnement::class, 'idapv_pap', 'id_apv');
    }

    /**
     * Get the partenaire that owns the Approvisionnement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partenaire(): BelongsTo
    {
        return $this->belongsTo(Partenaire::class, 'idptn_apv', 'id_ptn');
    }

    /**
     * Get the user that owns the Approvisionnement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idusrcreation_apv', 'id');
    }
}
