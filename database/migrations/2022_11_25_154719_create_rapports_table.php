<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_rap', function (Blueprint $table) {
            $table->id("id_rap");
            $table->string('objet_rap', 100);
            $table->datetime("date_reunion_dep");
            $table->text('description_rap');
            $table->string('empty1_rap', 100)->nullable();
            $table->string('empty2_rap', 100)->nullable();
            $table->string('empty3_rap', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation_rap')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport_rap');
    }
}
