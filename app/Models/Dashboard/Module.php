<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle',
        'idsmo',
        'lien',
        'class',
        'icone',
        'rang',
        'idusrcreation',
    ];

    /**
     * Get all of the sous_modules for the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sous_modules(): HasMany
    {
        return $this->hasMany(Module::class,'idsmo');
    }

    /**
     * Get the parent_module that owns the Module
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent_module(): BelongsTo
    {
        return $this->belongsTo(Module::class,"idsmo");
    }
}
