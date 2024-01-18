<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
