<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versement_ver', function (Blueprint $table) {
            $table->id('id_ver');
            $table->unsignedBigInteger('idcmd_ver')->index();
            $table->float('montant_ver', 21);
            $table->string('empty1_ver', 100)->nullable();
            $table->string('empty2_ver', 100)->nullable();
            $table->string('empty3_ver', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_ver')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versement_ver');
    }
}
