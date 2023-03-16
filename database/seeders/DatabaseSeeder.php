<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Player;
use \App\Models\Team;
use \App\Models\Coach;
use \App\Models\FootballGame;
use \App\Models\AssistantCoach;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $teams = Team::factory(10)->hasCoach(1)->create();
        foreach($teams as $team){
            Player::factory(10)->create(['team_id'=>$team]); 
        }
        
        $fotbalGames = FootballGame::factory(10)->create();
        foreach($fotbalGames as $fotbalGame){
            $fotbalGame->players(1)->attach($fotbalGame);
        }

        $coaches = Coach::get();
        foreach ($coaches as $coach) {
            AssistantCoach::factory(3)->create(['coach_id' => $coach->id]);
        }
    }
}
