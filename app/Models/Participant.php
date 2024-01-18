<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['name', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
