<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_cmd', function (Blueprint $table) {
            $table->id('id_cmd');
            $table->string('numero_cmd', 100)->index()->nullable();
            $table->unsignedBigInteger('idptn_cmd')->index();
            $table->unsignedBigInteger('idusr_cmd')->index()->nullable();
            $table->float('montant_cmd', 21)->nullable();
            $table->float('montant_payer_cmd', 21)->nullable();
            $table->integer('quantite_cmd')->nullable();
            $table->string('telephone_cmd')->nullable();
            $table->date('date_livraison_cmd');
            $table->string('empty1_cmd', 100)->nullable();
            $table->string('empty2_cmd', 100)->nullable();
            $table->string('empty3_cmd', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_cmd')->index();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_cmd');
    }
}
