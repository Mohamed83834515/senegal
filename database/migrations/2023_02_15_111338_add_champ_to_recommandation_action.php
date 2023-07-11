<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChampToRecommandationAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommandation_action_rma', function (Blueprint $table) {
            $table->date('date_suivi_rma')->nullable();
            $table->bigInteger('statut_rma')->nullable();
            $table->text('text_rma')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommandation_action_rma', function (Blueprint $table) {
            //
        });
    }
}
