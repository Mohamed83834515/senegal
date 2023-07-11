<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauPlanAnalytiqueNpa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_plan_analytique_npa', function (Blueprint $table) {
            $table->id('id_npa');
            $table->string('libelle_npa')->nullable();
            $table->timestamps();
            $table->integer('niveau_npa');
            $table->integer('taille_npa');
            $table->integer('geler_npa')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveau_plan_analytique_npa');
    }
}
