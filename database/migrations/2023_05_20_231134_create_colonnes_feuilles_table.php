<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColonnesFeuillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonnes_feuilles', function (Blueprint $table) {
            $table->id('id_col');
            $table->bigInteger('id_feuille')->nullable();
            $table->string('nom_colonne')->nullable();
            $table->bigInteger('rang')->nullable();
            $table->bigInteger('affiche')->nullable();
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
        Schema::dropIfExists('colonnes_feuilles');
    }
}
