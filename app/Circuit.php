<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title', 'description','difficulte','latitude','longitude','duree','user_id'
    ];

       public function spots(){
        return $this->hasMany('App\Spot');
        }


}
