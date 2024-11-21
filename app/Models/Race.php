<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = [
        'distance_goal',
        'distance_done',
        'open_date',
        'close_date',
    ];

    public function raceTrackings()
    {
        return $this->hasMany(RaceTracking::class);
    }
}
