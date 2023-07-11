<?php

namespace App\Models\SuiviResultat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservationPTBA extends Model
{
    use HasFactory;

    protected $table = 'observation_ptba_op';

    protected $fillable = [
        'id_ptba_op',
        'ugl_op',
        'observation_op',
        'executant_op',
        'enregisrer_par_op',
        'modifier_par_op',
        'geler_op',
    ];

    protected $primaryKey = 'id_op';


}
