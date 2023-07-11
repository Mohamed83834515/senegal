<?php



namespace App\Models\SuiviResultat;

use App\Models\Parametrages\Partenaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Feuille extends Model
{
    use HasFactory;

    protected $table = 'feuille_f';

    protected $fillable = [
        'id_f',
        'classeur_f',
        'nom_f',
        'table_f',
        'enregisrer_par_f',
        'modifier_par_f',
        'geler_f',
        'created_at',
        'updated_at'
    ];


    protected $primaryKey = 'id_f';
     
   
   

}

