<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tache', function (Blueprint $table) {
            $table->id();
            $table->string("commentaire_tache");
            $table->string("status");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("dossier")->nullable();
            $table->string("libelle_tch");
            $table->foreign('dossier')->references('id_doss')->on('docs_dossier');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('taches');
    }
}
