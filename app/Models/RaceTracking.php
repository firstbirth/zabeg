<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceTracking extends Model
{
    protected $table = 'races_tracking';

    protected $fillable = [
        'race_id',
        'user_id',
        'distance_commit',
        'date_commit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
