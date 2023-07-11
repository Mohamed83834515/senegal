<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneIdprojetIdProgrammeNiveauPlanAnalytique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('niveau_plan_analytique_npa', function (Blueprint $table) {
            $table->bigInteger('idprj_npa')->nullable();
            $table->bigInteger('idprg_npa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('niveau_plan_analytique_npa', function (Blueprint $table) {
            //
        });
    }
}
