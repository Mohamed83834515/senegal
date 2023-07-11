<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommandationAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommandation_action_rma', function (Blueprint $table) {
            $table->id('id_rma');
            $table->string('resume_rma');
            $table->string('intitule_rma');
            $table->string('code_rma');
            $table->date('date_butoir_rma');
            $table->bigInteger('type_recommandation_rma');
            $table->string('structure_concerne_rma')->nullable(); 
            $table->date('date_suivi_rma')->nullable();
            $table->bigInteger('statut_rma')->nullable();
            $table->text('text_rma')->nullable(); 
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
        Schema::dropIfExists('recommandation_action');
    }
}
