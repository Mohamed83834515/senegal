<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVillage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('villages_vil', function (Blueprint $table) {
            $table->string('logitude_vil')->nullable();
            $table->string('latitude_vil')->nullable();
            $table->integer('homme_vil')->nullable();
            $table->integer('femme_vil')->nullable();
            $table->integer('jeune_vil')->nullable();
            $table->integer('menage_vil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('villages_vil', function (Blueprint $table) {
            //
        });
    }
}
