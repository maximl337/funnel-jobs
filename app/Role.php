<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable = [
    	'name'
    ];

    public function getNameAttribute($name)
    {
    	return ucfirst($name);
    }

    public function users()
    {
    	return $this->belongsToMany(App\User::class);
    }
}
