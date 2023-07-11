<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeActiviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_activite_tpa', function (Blueprint $table) {
            $table->id('id_tpa');
            $table->string('code_tpa',255)->nullable();
            $table->unsignedBigInteger('structure_tpa')->nullable();
            $table->string('libelle_tpa',255)->nullable();
            $table->unsignedBigInteger('idusrcreation_tpa'); 
            $table->dateTime('date_modifie_tpa')->nullable();
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
        Schema::dropIfExists('type_activite');
    }
}
