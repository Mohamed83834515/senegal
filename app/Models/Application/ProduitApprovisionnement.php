<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitApprovisionnement extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pap';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produit_approvisionnements_pap';

    /**
     * Get the produit that owns the Produit_commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class, 'idpro_pap', 'id_pro');
    }

    /**
     * Get the commande that owns the Produit_commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvisionnement(): BelongsTo
    {
        return $this->belongsTo(Approvisionnement::class, 'idapv_pap', 'id_apv');
    }
}
