<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGelerNclNiveauCadreLogiqueNcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_cadre_logique_ncl', function (Blueprint $table) {
            $table->integer('geler_ncl')->default(0);
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
