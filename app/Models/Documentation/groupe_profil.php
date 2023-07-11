<?php

namespace App\Models\Documentation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe_profil extends Model
{
    use HasFactory;
    protected $table = 'groupe_profils';
    protected $fillable = [
        'groupe_id',
        'user_id',
    ]
    ;
}
