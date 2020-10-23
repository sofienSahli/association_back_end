<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'type', 'file','filable_type','filable_id'
    ];

public function filable(){
	return $this->morphTo();
}
}
