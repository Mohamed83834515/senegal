<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaire_ptn', function (Blueprint $table) {
            $table->id('id_ptn');
            $table->unsignedBigInteger('idtyp_ptn')->index();
            $table->string('libelle_ptn');
            $table->string('telephone_ptn')->nullable();
            $table->string('emplacement_ptn')->nullable();
            $table->string('empty1_ptn', 100)->nullable();
            $table->string('empty2_ptn', 100)->nullable();
            $table->string('empty3_ptn', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_ptn')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partenaire_ptn');
    }
}
