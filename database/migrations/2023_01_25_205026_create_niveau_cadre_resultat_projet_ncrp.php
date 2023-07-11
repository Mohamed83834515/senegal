<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauCadreResultatProjetNcrp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_cadre_resultat_projet_ncrp', function (Blueprint $table) {
            $table->id('id_ncrp');
            $table->string('libelle_ncrp')->nullable();
            $table->timestamps();
            $table->integer('niveau_ncrp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveau_cadre_resultat_projet_ncrp');
    }
}
