<?php

namespace App\Models;

use App\Models\Application\Structure;
use App\Models\Dashboard\Profil;
use App\Models\Parametrages\Fonction;
use App\Models\Application\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profil_id',
        'nom',
        'prenom',
        'email',
        'first_connected_at',
        'password',
        'idusrcreation',
        'fonction_id',
        'titre',
        'structure_id',
        'geler',
        'telephone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Get the profil that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
    public function fonction(): BelongsTo
    {
        return $this->belongsTo(Fonction::class, 'fonction_id','id_fnct');
    }

    /**
     * Get all of the transactions for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'idusrcreation_tra', 'id');
    }

    /**
     * Get the structure that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure(): BelongsTo
    {
        return $this->belongsTo(Structure::class, 'structure_id', 'id_str');
    }
}
