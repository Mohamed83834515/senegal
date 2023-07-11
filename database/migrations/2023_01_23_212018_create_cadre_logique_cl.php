<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadreLogiqueCl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadre_logique_cl', function (Blueprint $table) {
            $table->id('id_cl');
            $table->string('code_cl',20)->nullable();
            $table->string('projet_cl',20)->nullable();
            $table->string('intitule_cl')->nullable();
            $table->unsignedBigInteger('id_parent_cl')->nullable();
            $table->unsignedBigInteger('id_niv_cl')->nullable();
            $table->timestamps();
            $table->integer('geler_cl')->index()->default(0);

            $table->foreign('id_niv_cl')
                ->references('id_ncl')
                ->on('niveau_cadre_logique_ncl')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreign('id_parent_cl')
                ->references('id_cl')
                ->on('cadre_logique_cl')
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
        Schema::dropIfExists('cadre_logique_cl');
    }
}
