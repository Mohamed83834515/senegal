<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptba', function (Blueprint $table) {
            $table->id('id_ptba');
            $table->integer('annee_ptba');
            $table->bigInteger('code_activite_ptba');
            $table->text('intitule_activite_ptba');
            $table->string('debut_ptba');
            $table->string('structure_ptba')->nullable();
            $table->string('partenaire_ptba')->nullable();
            $table->bigInteger('projet_ptba');
            $table->string('zone_ptba')->nullable();
            $table->bigInteger('localite_ptba')->nullable();
            $table->text('observation_ptba')->nullable();
            $table->bigInteger('type_activite_ptba')->nullable();
            $table->string('enregistrer_par_ptba');
            $table->integer('etat_ptba')->default(0);
            $table->integer('geler_ptba')->default(0);
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
        Schema::dropIfExists('ptba');
    }
}
