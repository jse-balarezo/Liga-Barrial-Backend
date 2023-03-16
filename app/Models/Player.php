<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FootballGame;
use App\Models\Team;
class Player extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "players" ;
    protected $fillable = [
        "age",
        "name",
        "nickname",
        "player_position",
        "salary",
        "state"
    ];
    /**
     * The roles that belong to the Player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function footballGames()
    {
        return $this->belongsToMany(FootballGame::class);
    }


    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}
