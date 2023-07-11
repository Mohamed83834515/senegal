<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitesLocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localites_loc', function (Blueprint $table) {
            $table->id('id_localite');
            $table->string('code_localite',20)->nullable();
            $table->string('intitule_localite')->nullable();
            $table->unsignedBigInteger('id_parent_localite')->nullable();
            $table->string('code_localite_national')->nullable();


            $table->unsignedBigInteger('idniv_localite')->nullable();
            
            $table->foreign('idniv_localite')
                            ->references('id_nvl')
                            ->on('niveau_localite_nvl')
                            ->cascadeOnUpdate()
                            ->nullOnDelete();

            $table->foreign('id_parent_localite')
                            ->references('id_localite')
                            ->on('localites_loc')
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
        Schema::dropIfExists('localites_loc');
    }
}
