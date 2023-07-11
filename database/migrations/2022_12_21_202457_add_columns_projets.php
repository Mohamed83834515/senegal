<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsProjets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projet_prj', function (Blueprint $table) {
            $table->integer('direction_lead_prj')->nullable();
            $table->string('maitre_oeuvre_prj')->nullable();
            $table->date('date_fin_prj')->nullable();
            $table->string('financement_prj')->nullable();
            $table->text('matrice_prj')->nullable();
            $table->text('couverture_prj')->nullable();
            $table->text('objectifs_prj')->nullable();
            $table->integer('type_projet_prj')->nullable();
            $table->text('mode_execution_prj')->nullable();
            $table->text('priorite_prj')->nullable();
            $table->text('resultats_prj')->nullable();
            $table->string('fichier_shape_file_prj')->nullable();
            $table->string('couleur_prj')->nullable();
            $table->text('zone_prj')->nullable();
            $table->text('thematiques')->nullable();
            $table->text('description_prj')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projet_prj', function (Blueprint $table) {
            //
        });
    }
}
