<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtbaIndicateurPi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptba_indicateur_pi', function (Blueprint $table) {
            $table->id('id_pi');
            $table->string('code_pi');
            $table->bigInteger('activite_ptba_pi');
            $table->bigInteger('indicateur_produit_pi');
            $table->text('intitule_pi');
            $table->bigInteger('unite_pi');
            $table->double('valeur_cible_pi')->nullable();
            $table->string('enregistrer_par_pi');
            $table->string('modifier_par_pi')->nullable();
            $table->integer('etat_pi')->default(0);
            $table->integer('geler_pi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptba_indicateur_pi');
    }
}
