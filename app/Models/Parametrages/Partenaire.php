<?php

namespace App\Models\Parametrages;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $table = 'partenaire_pat';

    protected $fillable = [
        'code_pat',
        'sigle_pat',
        'definition_pat',
        'type_pat',
        'contact_pat',
        'email_pat',
        'logo_pat'
    ];


    protected $primaryKey = 'id_pat';
    protected $casts = [
        'type_pat' => 'array',
    ];

    public function typepartenaire()
    {
        return $this->belongsTo(Typepartenaire::class,'type_pat','id_tpt');
    }
}
