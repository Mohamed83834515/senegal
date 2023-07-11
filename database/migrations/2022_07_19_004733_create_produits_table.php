<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit_pro', function (Blueprint $table) {
            $table->id('id_pro');
            $table->unsignedBigInteger('idmar_pro')->index()->nullable();
            $table->unsignedBigInteger('idcat_pro')->index()->nullable();
            $table->string('slug_pro')->index()->nullable();
            $table->string('libelle_pro');
            $table->string('photo_pro')->nullable();
            $table->longText('description_pro')->nullable();
            $table->float('prix_pro', 21)->nullable();
            $table->float('reduction_pro', 21)->nullable();
            $table->integer('quantite_pro')->nullable();
            $table->string('empty1_pro', 100)->nullable();
            $table->string('empty2_pro', 100)->nullable();
            $table->string('empty3_pro', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_pro')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_pro');
    }
}
