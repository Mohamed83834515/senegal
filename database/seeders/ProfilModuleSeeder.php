<?php

namespace Database\Seeders;

use App\Models\Dashboard\ProfilModule;
use Illuminate\Database\Seeder;

class ProfilModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfilModule::insert([
            [
                "profil_id" => 1,
                "module_id" => 1,
                'idusrcreation' => 1,
            ],
            [
                "profil_id" => 1,
                "module_id" => 2,
                'idusrcreation' => 1,
            ],
            [
                "profil_id" => 1,
                "module_id" => 3,
                'idusrcreation' => 1,
            ],
            [
                "profil_id" => 1,
                "module_id" => 4,
                'idusrcreation' => 1,
            ],
            [
                "profil_id" => 1,
                "module_id" => 5,
                'idusrcreation' => 1,
            ],
        ]);
    }
}
