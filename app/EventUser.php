<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $table = 'eventusers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inscrit', 'event', 'is_confirmed'
    ];

    public function subscriber()
    {
        return $this->hasMany('App\User', 'inscrit', 'id');
    }

    public function event()
    {
        return $this->hasMany('App\Event', 'event', 'id');
    }
}
