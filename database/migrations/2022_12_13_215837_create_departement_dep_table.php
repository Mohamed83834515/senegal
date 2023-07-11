<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementDepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement_dep', function (Blueprint $table) {
            $table->id('id_dep');
            $table->string('code_dep')->nullable();
            $table->string('nom_dep')->nullable();
            $table->string('abrege_dep')->nullable();
            $table->bigInteger('idusrcreation_dep')->nullable();
            $table->bigInteger('idusrcreation_modif_dep')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('idreg_dep')->nullable();


            $table->foreign('idreg_dep')
                    ->references('id_reg')
                    ->on('region_reg')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departement_dep');
    }
}
