<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_cat', function (Blueprint $table) {
            $table->id('id_cat');
            $table->unsignedBigInteger('idcat_cat')->nullable(); // id categorie parent
            $table->string('libelle_cat');
            $table->string('empty1_cat', 100)->nullable();
            $table->string('empty2_cat', 100)->nullable();
            $table->string('empty3_cat', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_cat');

            $table->index('idcat_cat');
            $table->index('idusrcreation_cat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_cat');
    }
}
