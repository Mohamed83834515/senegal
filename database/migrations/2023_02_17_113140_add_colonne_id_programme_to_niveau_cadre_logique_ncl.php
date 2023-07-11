<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneIdProgrammeToNiveauCadreLogiqueNcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_cadre_logique_ncl', function (Blueprint $table) {
            $table->bigInteger('idprg_ncl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('niveau_cadre_logique_ncl', function (Blueprint $table) {
            //
        });
    }
}
