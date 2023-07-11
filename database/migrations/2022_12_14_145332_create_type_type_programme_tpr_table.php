<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTypeProgrammeTprTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_programme_tpr', function (Blueprint $table) {
            $table->id('id_tpr');
            $table->string('nom_tpr');
            $table->string('description_tpr')->nullable();
            $table->integer('geler_tpr')->default(0);
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
        Schema::dropIfExists('type_programme_tpr');
    }
}
