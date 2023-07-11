<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanAnalytiquePa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_analytique_pa', function (Blueprint $table) {
            $table->id('id_pa');
            $table->string('structure_pa');
            $table->string('projet_pa');
            $table->string('code_pa');
            $table->string('code_cor_pa')->nullable();
            $table->string('intitule_pa');
            $table->integer('id_niv_pa');
            $table->string('id_parent_pa')->nullable();
            $table->string('id_personne_pa');
            $table->integer('geler_pa')->default(0);
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
        Schema::dropIfExists('plan_analytique_pa');
    }
}
