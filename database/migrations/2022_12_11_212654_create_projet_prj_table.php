<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetPrjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_prj', function (Blueprint $table) {
            $table->id('id_prj');
            $table->string('code_prj',10)->unique();
            $table->string('sigle_prj')->nullable();
            $table->string('intitule_prj')->nullable();
            $table->integer('duree_prj')->nullable();
            $table->date('date_signature_prj')->nullable();
            $table->date('date_demarrage_prj')->nullable();
            $table->string('logo_prj')->nullable();
            $table->boolean('actif_prj')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('idprg_prj')->nullable();


            $table->foreign('idprg_prj')
                    ->references('id_prg')
                    ->on('programme_prg')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_prj');
    }
}
