<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Player;

class FootballGame extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "date",
        "loser",
        "number_matches",
        "penalties",
        "winner",
        "tied"
    ];
    /**
     * The players that belong to the FootballGame
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
