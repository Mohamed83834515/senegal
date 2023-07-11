<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depense_dep', function (Blueprint $table) {
            $table->id("id_dep");
            $table->string("motif_dep");
            $table->float("montant_dep", 21);
            $table->datetime("date_depense_dep");
            $table->text("description_dep")->nullable();
            $table->string('empty1_dep', 100)->nullable();
            $table->string('empty2_dep', 100)->nullable();
            $table->string('empty3_dep', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_dep')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depense_dep');
    }
}
