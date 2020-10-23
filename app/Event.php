<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description','prposed_by', 'starting_date', 'place','longitude','latitude','theme','duration','is_allowed'
    ];
   public function medias(){
        return $this->morphMany('App\Media', 'filable');
    }
    public function proposer()
    {
        return $this->belongsTo('App\User','prposed_by','id');
    }
    public function participants(){
       return $this->hasMany('App\EventUser' , 'event', 'id');
    }
}
