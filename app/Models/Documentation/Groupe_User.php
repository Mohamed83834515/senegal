<?php

namespace App\Models\Documentation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe_User extends Model
{
    use HasFactory;
    protected $table = 'groupe_users';
    protected $fillable=[
        'designation',
        'commentaire',
        'responsable',
        'nbr_user',
    ];


}
