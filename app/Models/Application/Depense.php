<?php

namespace App\Models\Application;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depense extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'motif_dep',
        'montant_dep',
        'date_depense_dep',
        'description_dep',
        'empty1_dep',
        'empty2_dep',
        'empty3_dep',
        'idusrcreation_dep',
    ];

     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_dep';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'depense_dep';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_depense_dep' => 'date',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /**
     * Get the user that owns the Depense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idusrcreation_dep');
    }
}
