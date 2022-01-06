<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobiliarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiliario', function (Blueprint $table) {
            $table->id('id_mobiliario');
            $table->string('descripcion', 250);
            $table->integer('cantidad');
            $table->string('marca_modelo', 250);
            $table->string('no_serie', 250);
            $table->string('proveedor', 250);
            $table->string('codigo_id', 150);
            $table->string('sede_origen', 150);
            $table->string('sede_ubicacion', 150);
            $table->string('categoria', 150);
            $table->string('notas', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobiliario');
    }
}
