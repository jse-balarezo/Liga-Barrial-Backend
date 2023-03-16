<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootballGamePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('football_game_player', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->foreignId('football_game_id')
                ->constrained('football_games');
            
            $table->foreignId('player_id')
                ->constrained('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_game_player');
    }
}
