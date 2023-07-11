<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurProjetIprj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateur_projet_iprj', function (Blueprint $table) {
            $table->id('id_iprj');
            $table->integer('niveau_iprj')->nullable();
            $table->integer('liaison_prg_iprj')->nullable();
            $table->string('code_indicateur_iprj')->nullable();
            $table->string('code_iprj')->nullable();
            $table->string('intitule_iprj')->nullable();
            $table->integer('unite_iprj')->nullable();
            $table->string('intitule_cible_iprj')->nullable();
            $table->double('valeur_cible_iprj')->nullable();
            $table->string('valeur_cible_rmp_iprj')->nullable();
            $table->string('intitule_reference_iprj')->nullable();
            $table->integer('annee_reference_iprj')->nullable();
            $table->double('valeur_reference_iprj')->nullable();
            $table->string('periodicite_iprj')->nullable();
            $table->string('source_verification_iprj')->nullable();
            $table->string('fonction_agregat_iprj')->nullable();
            $table->integer('referentiel_iprj')->nullable();
            $table->integer('typologie_iprj')->default(1);
            $table->string('responsable_iprj')->nullable();
            $table->string('fournisseur_iprj')->nullable();
            $table->string('description_iprj')->nullable();
            $table->string('echelle_iprj')->nullable();
            $table->string('mode_suivi_iprj')->nullable();
            $table->integer('categorie_indicateur_iprj')->nullable();
            $table->string('paccueil')->nullable();
            $table->integer('projet_iprj');
            $table->string('enregistrer_par_iprj')->nullable();
            $table->timestamps();
            $table->integer('geler_iprj')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicateur_projet_iprj');
    }
}
