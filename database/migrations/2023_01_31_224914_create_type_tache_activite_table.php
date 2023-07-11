<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTacheActiviteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_tache_activite_tta', function (Blueprint $table) {
            $table->id('id_tta');
            $table->bigInteger('ordre_tta')->nullable();
            $table->unsignedBigInteger('activite_tpa');
            $table->string('intitule_tta',255)->nullable();
            $table->bigInteger('proportion_tta')->nullable();
            $table->unsignedBigInteger('idusrcreation_tta'); 
            $table->dateTime('date_modifie_tta')->nullable();
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
        Schema::dropIfExists('type_tache_activite');
    }
}
