<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtbaTachePt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptba_tache_pt', function (Blueprint $table) {
            $table->id('id_pt');
            $table->string('code_pt');
            $table->bigInteger('type_activite_pt');
            $table->float('proportion_pt')->nullable()->default(0);
            $table->text('intitule_pt');
            $table->string('enregistrer_par_pt');
            $table->string('modifier_par_pt')->nullable();
            $table->integer('etat_pt')->default(0);
            $table->integer('geler_pt')->default(0);

            $table->string('periode_pt')->nullable();
            $table->string('valider_pt')->default('non');
            $table->date('date_debut_pt')->nullable();
            $table->date('date_fin_pt')->nullable();
            $table->string('projet_pt')->nullable();
            $table->integer('lot_pt')->default(1);
            $table->text('observation_pt')->nullable();
            $table->date('date_suivi_pt')->nullable();
            $table->string('responsable_pt')->nullable();
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
        Schema::dropIfExists('ptba_tache_pt');
    }
}
