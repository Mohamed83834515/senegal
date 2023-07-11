<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneNiveauClIprg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicateur_programme_iprg', function (Blueprint $table) {
            $table->bigInteger('niveau_cl_iprg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicateur_programme_iprg', function (Blueprint $table) {
            //
        });
    }
}
