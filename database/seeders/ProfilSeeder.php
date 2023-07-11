<?php

namespace Database\Seeders;

use App\Models\Dashboard\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profil::create([
            'libelle' => "Administrateur",
            'commentaire' => "profil permettant l'accès à tous les modules",
            'idusrcreation' => 1,
        ]);
    }
}
