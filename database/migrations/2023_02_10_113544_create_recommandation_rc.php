<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommandationRc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommandation_rc', function (Blueprint $table) {
            $table->id('id_rc');
            $table->string('code_rc');
            $table->text('intitule_rc')->nullable();
            $table->string('reference_rc')->nullable();
            $table->double('montant_rc')->nullable();
            $table->string('projet_rc');
            $table->bigInteger('partenaires_rc')->nullable();
            $table->text('region_concerne_rc')->nullable();
            $table->text('objectif_rc')->nullable();
            $table->date('debut_rc');
            $table->date('fin_rc');
            $table->string('enregistrer_par_rc');
            $table->string('modifier_par_rc')->nullable();
            $table->integer('etat_rc')->default(0);
            $table->integer('geler_rc')->default(0);
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
        Schema::dropIfExists('recommandation_rc');
    }
}
