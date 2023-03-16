<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootballGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date')
                ->coment('fecha del partido');

            $table->mediumText('loser') 
                ->comment('Perdedor del partido');

            $table->integer('number_matches') 
                ->comment('Numero de los partidos');
                
            $table->boolean('penalties')
                ->comment('Ingreso para saber si en el partido hiubieron penales, si hubo(True), no hubo penales (false)');
                
            $table->boolean('tied')
                ->comment('Ingreso para saber si en el partido se empataron los equipos, si hubo empate(True), no hubo empate (false)');
            
            $table->string('winner') 
                ->comment('Ganador del partido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_games');
    }
}
