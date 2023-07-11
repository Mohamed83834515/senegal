<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadreResultatProjetCrp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadre_resultat_projet_crp', function (Blueprint $table) {
            $table->id('id_crp');
            $table->integer('projet_crp');
            $table->string('code_crp');
            $table->string('intitule_crp');
            $table->string('abge_crp')->nullable();
            $table->integer('id_niv_crp')->nullable();
            $table->string('id_parent_crp')->nullable();
            $table->string('liaison_crp')->nullable();
            $table->string('type_resultat_crp')->nullable();
            $table->double('budget_activite_crp')->nullable();
            $table->string('categorie_depense_crp')->nullable();
            $table->string('commentaire_activite_crp')->nullable();
            $table->integer('geler_crp')->default(0);
            $table->timestamps();

        //     $table->foreign('id_niv_crp')
        //     ->references('id_ncrp')
        //     ->on('niveau_cadre_logique_ncrp')
        //     ->cascadeOnUpdate()
        //     ->nullOnDelete();

        // $table->foreign('id_parent_crp')
        //     ->references('id_crp')
        //     ->on('cadre_logique_crp')
        //     ->cascadeOnUpdate()
        //     ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadre_resultat_projet_crp');
    }
}
