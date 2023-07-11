<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtbaCoutPc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptba_cout_pc', function (Blueprint $table) {
            $table->id('id_pc');
            $table->bigInteger('activite_pc');
            $table->bigInteger('bailleur_pc');
            $table->bigInteger('structure_pc')->nullable();
            $table->double('montant_pc');
            $table->text('observation_pc')->nullable();
            $table->string('enregistrer_par_pc');
            $table->string('modifier_par_pc')->nullable();
            $table->integer('etat_pc')->default(0);
            $table->integer('geler_pc')->default(0);

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
        Schema::dropIfExists('ptba_cout_pc');
    }
}
