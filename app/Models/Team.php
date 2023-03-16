<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // llamar en todos los modelos
use App\Models\Coach;
use App\Models\Player;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "teams" ;
    protected $fillable = [
        "amount",
        "name",
        "nickname",
        "ranking",
        "state"
    ];
    /**
     * Get the coach that owns the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coach()
    {
        return $this->hasOne(Coach::class);
    }


    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
