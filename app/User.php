<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','phone','role', 'email', 'password','birth_date','isActive','activation_code'
    ];

   public function medias(){
        return $this->morphMany('App\Media', 'filable');
    }
    public function events(){
        return $this->hasMany('App\Event','prposed_by', 'id');
    }
}
