<?php

namespace App\Models\Documentation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs_fichier extends Model
{
    use HasFactory;
    protected $table = 'docs_fichier';

    protected $fillable = [
        'libelle_fichier',
        'geller',
        'id_dossier',
        'commentaire',
        'fichier',
        'tache_id'
    ];


    protected $primaryKey = 'id_fich';

        public function getFilePathAttribute()
    {
        return storage_path('app/' . $this->fichier);
    }

}
