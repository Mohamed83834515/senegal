<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurCs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateur_cs', function (Blueprint $table) {
            $table->id('id_ics');
            $table->string('code_ics');
            $table->string('intitule_ics');
            $table->string('intitule_cible_ics');
            $table->string('valeur_cible_ics');
            $table->string('annee_ref_ics');
            $table->string('valeur_ref_ics');
            $table->string('unite_ics');
            $table->string('mode_calcul_ics');
            $table->string('page_acc_ics')->nullable();
            $table->string('projet_ics');
            $table->string('personnel_ics')->nullable();
            $table->timestamps();
            $table->string('geler_ics')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicateur_cs');
    }
}
