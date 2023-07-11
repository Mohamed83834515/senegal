<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousPrefectureSpfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_prefecture_spf', function (Blueprint $table) {
            $table->id('id_spf');
            $table->string('code_spf')->nullable();
            $table->string('nom_spf')->nullable();
            $table->bigInteger('idusrcreation_spf')->nullable();
            $table->bigInteger('idusrcreation_modif_spf')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('iddep_spf')->nullable();


            $table->foreign('iddep_spf')
                    ->references('id_dep')
                    ->on('departement_dep')
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
        Schema::dropIfExists('sous_prefecture_spf');
    }
}
