<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'description','isFone'
    ];

   public function medias(){ 
        return $this->morphMany('App\Media', 'filable');
    }
       public function individuals(){
        return $this->hasMany('App\Individual');

    }
}
