<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocaliteLocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localite_loc', function (Blueprint $table) {
            $table->id('id_loc');
            $table->unsignedBigInteger('id_parent_localite_loc')->nullable();
            $table->unsignedBigInteger('idlon_loc')->nullable();
            $table->string('code_loc',20)->nullable();
            $table->string('nom_loc')->nullable();
            $table->string('longitude_loc')->nullable();
            $table->string('latitude_loc')->nullable();
            $table->integer('homme_loc')->nullable();
            $table->integer('femme_loc')->nullable();
            $table->integer('jeune_loc')->nullable();
            $table->integer('menage_loc')->nullable();
            $table->timestamps();

            $table->foreign('idlon_loc')
                            ->references('id_lon')
                            ->on('niveau_localite_lon')
                            ->cascadeOnUpdate()
                            ->nullOnDelete();

            $table->foreign('id_parent_localite_loc')
                            ->references('id_loc')
                            ->on('localite_loc')
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
        Schema::dropIfExists('localite_loc');
    }
}
