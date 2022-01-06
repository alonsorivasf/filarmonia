<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumental', function (Blueprint $table) {
            $table->id('id_instrumental');
            $table->string('descripcion', 250);
            $table->string('marca', 150);
            $table->string('modelo', 150);
            $table->string('no_serie', 150);
            $table->string('codigo_id', 150);
            $table->string('sede_origen', 150);
            $table->string('sede_ubicacion', 150);
            $table->string('notas', 500);
            $table->unsignedInteger('limite')->default(1);
            $table->string('categoria', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumental');
    }
}
