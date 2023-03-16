<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes(); 

            //1 Jugador perteneces a 1 equipo
            //1 Equipo puede tener varios jugadores
            $table->foreignId('team_id')
                ->constrained('teams');
            
            $table->integer('age')
                ->comment('Ingreso de la edad del jugador');

            $table->string('name', 100)
                ->comment('Ingreso del nombre del jugador');

            $table->mediumText('nickname')
                ->comment('Ingreso del apodo del jugador');

            $table->string('player_position') 
                ->comment('Ingrese la posicion en la que juega el jugador');

            $table->float('salary', 8, 2)
                ->comment('Ingreso del valor que gana el jugador en el equipo');
                
            $table->boolean('state')
                ->default(true)
                ->comment('Ingreso del estado del jugador para saber si esta activo(True), lesionado (false)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
