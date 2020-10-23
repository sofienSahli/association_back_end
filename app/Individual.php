<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoneSpecies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'description','species_id'
    ];

    
    public function medias(){ 
        return $this->morphMany('App\Media', 'filable');
    }
	
	public function specie()
    {
        return $this->belongsTo('App\Species');
    }
}
