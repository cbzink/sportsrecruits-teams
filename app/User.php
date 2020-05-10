<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Disable timestamps on the User model.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Filter a query to only players.
     */
    public function scopePlayers($query)
    {
        return $query->where('user_type', 'player');
    }
}
