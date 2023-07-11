<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeActiviteConventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_activite_convention_tac', function (Blueprint $table) {
            $table->id('id_tac');
            $table->bigInteger('resultat_tac')->nullable();
            $table->string('code_tac',255)->nullable();
            $table->string('intitule_tac',255)->nullable(); 
            $table->unsignedBigInteger('idusrcreation_tac'); 
            $table->dateTime('date_modifie_tac')->nullable();
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
        Schema::dropIfExists('type_activite_convention');
    }
}
