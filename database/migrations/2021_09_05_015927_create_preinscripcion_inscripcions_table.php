<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreinscripcionInscripcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripcion_inscripcions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('preinscripcion_fecha_id')->unsigned();
            $table->integer('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('telefono');
            $table->string('instagram');
            $table->string('horarios');
            $table->boolean('cambio_turno')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('preinscripcion_fecha_id')->references('id')->on('preinscripcion_fechas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preinscripcion_inscripcions');
    }
}
