<?php



namespace App\Models\SuiviResultat;

use App\Models\Parametrages\Partenaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Classeur extends Model
{
    use HasFactory;

    protected $table = 'classeur_cl';

    protected $fillable = [
        'id_cl',
        'libelle_cl',
        'couleur_cl',
        'projet_cl',
        'enregisrer_par_cl',
        'modifier_par_cl',
        'geler_cl',
        'created_at',
        'updated_at'
    ];


    protected $primaryKey = 'id_cl';
     
   
   

}

