<?php



namespace App\Models\SuiviResultat;

use App\Models\Parametrages\Partenaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ColonneFeuille extends Model
{
    use HasFactory;

    protected $table = 'colonnes_feuilles';

    protected $fillable = [ 
        'id_feuille',
        'nom_colonne',
        'rang',
        'affiche'
    ];


    protected $primaryKey = 'id_col';
     
   
   

}

