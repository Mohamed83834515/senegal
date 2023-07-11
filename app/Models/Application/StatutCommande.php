<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatutCommande extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_stc';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statut_commande_stc';

    /**
     * Get the commande that owns the Produit_commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'idcmd_stc', 'id_cmd');
    }

    /**
     * Get the statut that owns the StatutCommande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statut(): BelongsTo
    {
        return $this->belongsTo(Parametre::class, 'idsta_stc', 'id_par');
    }
}
