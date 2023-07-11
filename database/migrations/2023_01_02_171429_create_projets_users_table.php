<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets_users_pru', function (Blueprint $table) {
            $table->id('id_pru');
             $table->unsignedBigInteger('idprj_pru')->nullable();
            $table->text('user_pru')->nullable();
            $table->timestamps();
            $table->foreign('idprj_pru')
                    ->references('id_prj')
                    ->on('projet_prj')
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
        Schema::dropIfExists('projets_users');
    }
}
