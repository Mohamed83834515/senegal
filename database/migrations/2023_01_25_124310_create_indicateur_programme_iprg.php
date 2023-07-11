<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurProgrammeIprg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateur_programme_iprg', function (Blueprint $table) {
            $table->id('id_iprg');
            $table->string('code_iprg')->nullable();
            $table->string('intitule_iprg')->nullable();
            $table->string('niveau_iprg')->nullable();
            $table->string('intitule_cible_iprg')->nullable();
            $table->string('valeur_cible_iprg')->nullable();
            $table->string('annee_reference_iprg')->nullable();
            $table->string('valeur_reference_iprg')->nullable();
            $table->integer('referentiel_iprg')->nullable();
            $table->string('unite_iprg');
            $table->string('source_verification_iprg')->nullable();
            $table->string('mode_calcul_iprg')->nullable();
            $table->string('description_iprg')->nullable();
            $table->integer('projet_iprg');
            $table->integer('echelle_iprg')->default(1);
            $table->string('enregistrer_par_iprg')->nullable();
            $table->timestamps();
            $table->string('page_iprg');
            $table->integer('geler_iprg')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicateur_programme_iprg');
    }
}
