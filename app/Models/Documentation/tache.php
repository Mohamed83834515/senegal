<?php

namespace App\Models\Documentation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    use HasFactory;
    protected $table = 'tache';
    protected $fillable = [
        'user_id',
        'commentaire_tache',
        'status',
        'libelle_tch',
        'dossier',
    ]
    ;
}
