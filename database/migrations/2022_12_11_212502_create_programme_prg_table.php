<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammePrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_prg', function (Blueprint $table) {
            $table->id('id_prg');
            $table->string('code_prg')->unique();
            $table->string('sigle_prg')->nullable();
            $table->string('nom_prg')->nullable();
            $table->string('vision_prg')->nullable();
            $table->string('objectif_prg')->nullable();
            $table->date('annee_debut_prg')->nullable();
            $table->date('annee_fin_prg')->nullable();
            $table->boolean('actif_prg')->default(0);
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
        Schema::dropIfExists('programme_prg');
    }
}
