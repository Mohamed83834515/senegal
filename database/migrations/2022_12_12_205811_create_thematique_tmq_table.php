<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThematiqueTmqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thematique_tmq', function (Blueprint $table) {
            $table->id('id_tmq');
            $table->string('nom_tmq');
            $table->string('description_tmq')->nullable();
            $table->string('photo_tmq')->nullable();
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
        Schema::dropIfExists('thematique_tmq');
    }
}
