<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_dossier', function (Blueprint $table) {
            $table->id('id_doss');
            $table->string("libelle_dossier", 100);
            $table->string("commentaire");
            $table->integer("geller");
            $table->integer("geller_doss");
            $table->unsignedBigInteger('id_grp_user');
            $table->foreign('id_grp_user')->references('id')->on('groupe_users');
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
        Schema::dropIfExists('docs_dossiers');
    }
}
