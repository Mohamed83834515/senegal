<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametre_par', function (Blueprint $table) {
            $table->id('id_par');
            $table->unsignedBigInteger('idtyp_par')->index();
            $table->string('code_par')->index();
            $table->string('libelle_par');
            $table->string('empty1_par', 100)->nullable();
            $table->string('empty2_par', 100)->nullable();
            $table->string('empty3_par', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_par')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parametre_par');
    }
}
