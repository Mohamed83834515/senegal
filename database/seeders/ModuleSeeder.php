<?php

namespace Database\Seeders;

use App\Models\Dashboard\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::insert([
            [
                'idsmo' => null,
                'libelle' => "Acceuil",
                'lien' => "dashboard.home",
                'class' => "true",
                'icone' => "icon-home4",
                'idusrcreation' => 1,
            ],
            [
                'idsmo' => null,
                'libelle' => "Administration",
                'lien' => "adminstration",
                'class' => "dashboard/administration/*",
                'icone' => "icon-stack",
                'idusrcreation' => 1,
            ],
            [
                'idsmo' => 2,
                'libelle' => "Modules",
                'lien' => "module.index",
                'class' => "false",
                'icone' => "icon-drawer3",
                'idusrcreation' => 1,
            ],
            [
                'idsmo' => 2,
                'libelle' => "Profils",
                'lien' => "profil.index",
                'class' => "false",
                'icone' => "icon-hammer-wrench",
                'idusrcreation' => 1,
            ],
            [
                'idsmo' => 2,
                'libelle' => "Utilisateurs",
                'lien' => "user.index",
                'class' => "false",
                'icone' => "icon-users4",
                'idusrcreation' => 1,
            ],
        ]);
    }
}
