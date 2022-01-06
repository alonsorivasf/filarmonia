<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecarioinstrumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becarioinstrumental', function (Blueprint $table) {
            $table->id('id_becarioinstrumental');
            $table->date('fecha_entrega');
            $table->date('fecha_cancelacion');
            $table->string('estatus')->default('ACTIVO');

            $table->foreignId('id_instrumental')->references('id_instrumental')->on('instrumental');
            $table->foreignId('id_becario')->references('id_becario')->on('becarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('becarioinstrumental');
    }
}
