<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairePatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaire_pat', function (Blueprint $table) {
            $table->id('id_pat');
            $table->string('code_pat',30)->nullable();
            $table->string('sigle_pat',20)->nullable();
            $table->string('definition_pat',20)->nullable();
            $table->string('type_pat')->nullable();
            $table->string('contact_pat',30)->nullable();
            $table->string('email_pat',60)->nullable();
            $table->string('logo_pat')->nullable();
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
        Schema::dropIfExists('partenaire_pat');
    }
}
