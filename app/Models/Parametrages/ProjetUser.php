<?php

namespace App\Models\Parametrages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetUser extends Model
{
    use HasFactory;
    
    protected $table = 'projets_users_pru';

    protected $fillable = [
        'idprj_pru',
        'iduser_pru',
        
    ];


    protected $primaryKey = 'id_pru';
    // protected $casts = [
    //     'user_pru' => 'array'
    // ];
    // public function projets()
    // {
    //     return $this->hasMany(Projet::class,'idusr_pru','id');
    // }
    
}
