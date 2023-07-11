<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionResultatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convention_resultat', function (Blueprint $table) {
            $table->id('id_cvr');
            $table->string('code_cvr',20)->nullable();
            $table->unsignedBigInteger('convention_cvr')->nullable();
            $table->string('intitule_cvr')->nullable();
            $table->unsignedBigInteger('ordre_cvr')->nullable();
            $table->unsignedBigInteger('fiche_cvr')->nullable();
            $table->timestamps();
            $table->integer('geler_cvr')->index()->default(0);

            $table->foreign('convention_cvr')
                ->references('id')
                ->on('convention_cvt')
                ->cascadeOnUpdate()
                ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convention_resultat');
    }
}
