<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneIdprojetNiveauCadreResultatProjet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_cadre_resultat_projet_ncrp', function (Blueprint $table) {
            $table->bigInteger('idprj_ncrp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('niveau_cadre_resultat_projet_ncrp', function (Blueprint $table) {
            //
        });
    }
}
