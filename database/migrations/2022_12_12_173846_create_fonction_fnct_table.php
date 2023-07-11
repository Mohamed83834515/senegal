<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonctionFnctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('fonction_fnct', function (Blueprint $table) {
                $table->id('id_fnct');
                $table->string('nom_fnct');
                $table->string('description_fnct')->nullable();
                $table->string('agence_fnct')->nullable();
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
        Schema::dropIfExists('fonction_fnct');
    }
}
