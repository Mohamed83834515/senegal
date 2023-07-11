<?php

namespace App\Models\Documentation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs_dossier extends Model
{
    use HasFactory;
    protected $table = 'docs_dossier';

    protected $fillable = [
        'libelle_dossier',
        'commentaire',
        'geller',
        'geller_doss',
        'id_grp_user',
    ];


    protected $primaryKey = 'id_doss';
}
