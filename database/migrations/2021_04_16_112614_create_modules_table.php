<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idsmo")->nullable();
            $table->string('libelle', 100);
            $table->string('icone', 100);
            $table->string('lien', 100);
            $table->string('class', 100);
            $table->integer('rang');
            $table->string('empty1', 100)->nullable();
            $table->string('empty2', 100)->nullable();
            $table->string('empty3', 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('idusrcreation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
