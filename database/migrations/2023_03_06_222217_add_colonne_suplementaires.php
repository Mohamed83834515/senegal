<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneSuplementaires extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicateur_programme_iprg', function (Blueprint $table) {
            $table->bigInteger('periodicite_calcul_iprg')->nullable();
            $table->string('donnees_sources_iprg')->nullable();
            $table->bigInteger('niveau_desagregation_iprg')->nullable();
            $table->bigInteger('moyen_diffusion_iprg')->nullable();
            $table->string('responsabilite_calcul_iprg')->nullable();
            $table->string('methode_collecte_iprg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicateur_programme_iprg', function (Blueprint $table) {
            //
        });
    }
}
