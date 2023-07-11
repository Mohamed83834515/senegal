<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_commande_pcm', function (Blueprint $table) {
            $table->id('id_pcm');
            $table->unsignedBigInteger('idpro_pcm')->index();
            $table->unsignedBigInteger('idcmd_pcm')->index();
            $table->integer('quantite_pcm');
            $table->float('prix_pcm', 21);
            $table->string('taille_pcm')->nullable();
            $table->string('couleur_pcm')->nullable();
            $table->string('empty1_pcm', 100)->nullable();
            $table->string('empty2_pcm', 100)->nullable();
            $table->string('empty3_pcm', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_pcm')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_commande_pcm');
    }
}
