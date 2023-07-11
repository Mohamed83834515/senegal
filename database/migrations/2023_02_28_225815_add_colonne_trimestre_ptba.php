<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColonneTrimestrePtba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ptba', function (Blueprint $table) {
            $table->bigInteger('trimestre1')->nullable();
            $table->bigInteger('trimestre2')->nullable();
            $table->bigInteger('trimestre3')->nullable();
            $table->bigInteger('trimestre4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ptba', function (Blueprint $table) {
            //
        });
    }
}
