<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory, SoftDeletes;

    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_cat';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie_cat';

    /**
     * Get all of the categories for the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sousCategories(): HasMany
    {
        return $this->hasMany(Categorie::class, 'idcat_cat', 'id_cat');
    }

    /**
     * Get the categorie that owns the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'idcat_cat');
    }

    /**
     * Get all of the produits for the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class, 'idcat_pro', 'id_cat');
    }
}
