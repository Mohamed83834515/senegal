<?php

namespace App\Models\Application;

use App\Models\Application\Marque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pro';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produit_pro';

    /**
     * Get the marque that owns the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marque(): BelongsTo
    {
        return $this->belongsTo(Marque::class, 'idmar_pro');
    }

    /**
     * Get the categorie that owns the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'idcat_pro');
    }

    /**
     * Get all of the photos for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class, 'idpro_pho', 'id_pro');
    }

    /**
     * Get all of the paniers for the Produit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paniers(): HasMany
    {
        return $this->hasMany(Panier::class, 'idpro_pan', 'id_pro');
    }

    /**
     * Get all of the produitCommandes for the Commande
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produitCommandes(): HasMany
    {
        return $this->hasMany(Produit_commande::class, 'idpro_pcm', 'id_cmd');
    }
}
