<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovisionnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvisionnement_apv', function (Blueprint $table) {
            $table->id('id_apv');
            $table->unsignedBigInteger('idptn_apv')->index();
            $table->unsignedBigInteger('idusr_apv')->index()->nullable();
            $table->float('montant_apv', 21)->nullable();
            $table->integer('quantite_apv')->nullable();
            $table->string('telephone_apv')->nullable();
            $table->date('date_livraison_apv');
            $table->string('empty1_apv', 100)->nullable();
            $table->string('empty2_apv', 100)->nullable();
            $table->string('empty3_apv', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_apv')->index();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvisionnement_apv');
    }
}
