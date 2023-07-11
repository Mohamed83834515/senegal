<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_parametre_typ', function (Blueprint $table) {
            $table->id('id_typ');
            $table->string('code_typ')->index();
            $table->string('libelle_typ');
            $table->string('empty1_typ', 100)->nullable();
            $table->string('empty2_typ', 100)->nullable();
            $table->string('empty3_typ', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_typ')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_parametre_typ');
    }
}
