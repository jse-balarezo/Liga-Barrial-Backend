<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            
            $table->float('amount', 8, 2)
                ->comment('Ingreso de monto del capital del equipo');

            $table->string('name', 100)
                ->comment('Nombre del Equipo');

            $table->mediumText('nickname')
                ->comment('Ingreso del apodo del jugador');

            $table->integer('ranking') 
                ->comment('Posicion general del equipo');

            $table->boolean('state')
                ->default(true)
                ->comment('Ingreso de actividad del estado, para saber si esta activo(True), inactivo (false)'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
