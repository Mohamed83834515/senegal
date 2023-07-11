<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit_commande extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pcm';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produit_commande_pcm';

    /**
     * Get the produit that owns the Produit_commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class, 'idpro_pcm', 'id_pro');
    }

    /**
     * Get the commande that owns the Produit_commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'idcmd_pcm');
    }
}
