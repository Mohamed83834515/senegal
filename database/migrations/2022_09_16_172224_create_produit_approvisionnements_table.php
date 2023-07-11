<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_approvisionnements_pap', function (Blueprint $table) {
            $table->id('id_pap');
            $table->unsignedBigInteger('idpro_pap')->index();
            $table->unsignedBigInteger('idapv_pap')->index();
            $table->integer('quantite_pap');
            $table->float('prix_pap', 21);
            $table->string('taille_pap')->nullable();
            $table->string('couleur_pap')->nullable();
            $table->string('empty1_pap', 100)->nullable();
            $table->string('empty2_pap', 100)->nullable();
            $table->string('empty3_pap', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_pap')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_approvisionnements_pap');
    }
}
