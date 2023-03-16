<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coach;

class AssistantCoach extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "age",
        "name",
        "nickname",
        "salary",
        "state"
    ];
    /**
     * Get the team associated with the AssistantCoach
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}

