<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePartenaireTptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_partenaire_tpt', function (Blueprint $table) {
            $table->id('id_tpt');
            $table->string('nom_tpt');
            $table->string('description_tpt')->nullable();
            $table->integer('geler_tpt')->default(0);
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
        Schema::dropIfExists('type_partenaire_tpt');
    }
}
