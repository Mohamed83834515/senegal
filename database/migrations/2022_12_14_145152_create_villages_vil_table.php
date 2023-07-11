<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesVilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages_vil', function (Blueprint $table) {
            $table->id('id_vil');
            $table->string('code_vil')->nullable();
            $table->string('nom_vil')->nullable();
            $table->bigInteger('idusrcreation_vil')->nullable();
            $table->bigInteger('idusrcreation_modif_vil')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('idspf_vil')->nullable();


            $table->foreign('idspf_vil')
                    ->references('id_spf')
                    ->on('sous_prefecture_spf')
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
        Schema::dropIfExists('villages_vil');
    }
}
