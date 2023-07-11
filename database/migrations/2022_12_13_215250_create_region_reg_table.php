<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_reg', function (Blueprint $table) {

            $table->id('id_reg');
            $table->string('code_reg')->nullable();
            $table->string('nom_reg')->nullable();
            $table->string('abrege_reg')->nullable();
            $table->string('couleur_reg')->nullable();
            $table->bigInteger('idusrcreation_reg')->nullable();
            $table->bigInteger('idusrcreation_modif_reg')->nullable();
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
        Schema::dropIfExists('region_reg');
    }
}
