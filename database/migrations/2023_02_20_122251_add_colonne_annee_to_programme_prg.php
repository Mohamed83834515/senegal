<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneAnneeToProgrammePrg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programme_prg', function (Blueprint $table) {
            $table->bigInteger('date_debut_prg')->nullable();
            $table->bigInteger('date_fin_prg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programme_prg', function (Blueprint $table) {
            //
        });
    }
}
