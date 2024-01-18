<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = ['participant_id', 'team_id', 'week'];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
