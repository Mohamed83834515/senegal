<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsFichiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs_fichier', function (Blueprint $table) {
            $table->id('id_fich');
            $table->string("libelle_fichier", 70);
            $table->string("commentaire");
            $table->string("fichier");
            $table->integer("geller");
            $table->integer("geller_doss");
            $table->bigInteger("id_dossier")->nullable();
            $table->bigInteger("tache_id")->nullable();
            $table->foreign('id_dossier')->references('id_doss')->on('docs_dossier');
            $table->foreign('tache_id')->references('id')->on('tache');
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
        Schema::dropIfExists('docs_fichiers');
    }
}
