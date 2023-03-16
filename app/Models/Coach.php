<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Team;

class Coach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "coaches" ;
    protected $fillable = [
        "age",
        "name",
        "nickname",
        "salary",
        "state"
    ];
    /**
     * Get the team associated with the Coach
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    /**
     * Get the coach that owns the AssistantCoach
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assistantCoach()
    {
        return $this->hasOne(AssistantCoach::class);
    }
}
