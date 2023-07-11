<?php

namespace App\Models\Application;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_cmd';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'commande_cmd';

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_livraison_cmd' => 'date',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Get all of the produitCommandes for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produitCommandes(): HasMany
    {
        return $this->hasMany(Produit_commande::class, 'idcmd_pcm', 'id_cmd');
    }

    /**
     * Get the partenaire that owns the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partenaire(): BelongsTo
    {
        return $this->belongsTo(Partenaire::class, 'idptn_cmd', 'id_ptn');
    }

    /**
     * Get all of the versements for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versements(): HasMany
    {
        return $this->hasMany(Versement::class, 'idcmd_ver', 'id_cmd');
    }

    /**
     * Get the user that owns the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idusrcreation_cmd', 'id');
    }

    /**
     * Get all of the statutCommandes for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statutCommandes(): HasMany
    {
        return $this->hasMany(StatutCommande::class, 'idcmd_stc', 'id_cmd');
    }
}
