<?php

namespace App\Models\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle',
        'commentaire',
        'idusrcreation',
    ];

    /**
     * Get all of the profil_modules for the Profil
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profil_modules(): HasMany
    {
        return $this->hasMany(ProfilModule::class, 'profil_id');
    }

    /**
     * Get all of the users for the Profil
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'profil_id');
    }
}
