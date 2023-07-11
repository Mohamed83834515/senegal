<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statut_commande_stc', function (Blueprint $table) {
            $table->id('id_stc');
            $table->unsignedBigInteger('idsta_stc')->index();
            $table->unsignedBigInteger('idcmd_stc')->index();
            $table->string('observation_stc', 100)->nullable();
            $table->string('empty1_stc', 100)->nullable();
            $table->string('empty2_stc', 100)->nullable();
            $table->string('empty3_stc', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_stc')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statut_commande_stc');
    }
}
