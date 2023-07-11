<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauCadreLogiqueNcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveau_cadre_logique_ncl', function (Blueprint $table) {
            $table->id('id_ncl');
            $table->string('libelle_ncl')->nullable();
            $table->timestamps();
            $table->integer('niveau_ncl');
            $table->integer('id_type_ncl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveau_cadre_logique_ncl');
    }
}
