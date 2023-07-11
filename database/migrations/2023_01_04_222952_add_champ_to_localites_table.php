<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChampToLocalitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('localites_loc', function (Blueprint $table) {
            $table->string('abreviation_localite')->nullable(); 
            $table->string('longitude_localite')->nullable(); 
            $table->string('latitude_localite')->nullable(); 
            $table->integer('homme_localite')->nullable(); 
            $table->integer('femme_localite')->nullable(); 
            $table->integer('jeune_localite')->nullable(); 
            $table->integer('menage_localite')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('localites_loc', function (Blueprint $table) {
            //
        });
    }
}
