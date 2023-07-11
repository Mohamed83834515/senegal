<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportDynamiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_dynamiques', function (Blueprint $table) {
            $table->id('id_rapp');
            $table->string("nom_rapport");
            $table->string("requette_rapport");
            $table->string("condition");
            $table->string("table_rapport");
            $table->string("colonne_rapport");
            $table->string("valeur");
            $table->string("operateur");
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
        Schema::dropIfExists('rapport_dynamiques');
    }
}
