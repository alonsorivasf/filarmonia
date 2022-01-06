<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBecariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('becarios', function (Blueprint $table) {
            $table->id('id_becario');
            $table->string('curp', 45)->unique();
            $table->string('nombre', 250);
            $table->date('fecha_nacimiento');
            $table->string('sexo', 20);
            $table->string('representante_1', 250);
            $table->string('representante_2', 250);
            $table->string('domicilio', 250);
            $table->string('localidad', 150);
            $table->string('municipio', 150);
            $table->string('telefono', 50);
            $table->string('correo', 150);
            $table->dateTime('fecha_ingreso');
            $table->string('estatus')->default('ACTIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('becarios');
    }
}
