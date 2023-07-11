<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumGelerTclToTypeCadreLogiqueTcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_cadre_logique_tcl', function (Blueprint $table) {
            $table->integer('geler_tcl')->index()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_cadre_logique_tcl', function (Blueprint $table) {
            //
        });
    }
}
