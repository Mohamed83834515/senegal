<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('module_id');
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
        Schema::dropIfExists('profil_modules');
    }
}
