<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // creacion de la tabla agenda
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('asunto');
            $table->date('fecha');
            // $table->string('hora');
            $table->time('hora', $precision = 0);
            // cliente_id - relacion con la tabla clientes
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            // $table->string('estado');

            // la colmumna estado solo puede tener estados predeterminados
            $table->enum('estado', ['Programada', 'Realizada', 'Cancelada', 'No Asistida']);

            // con la relacion se tiene en cuenta que un cliente puede tener muchas agendas pero las agenas solo puede tener un cliente
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
