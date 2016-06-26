<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
    	'name',
    	'body',
    	'icon'
    ];

    public function jobs()
    {
    	return $this->belongsToMany(Job::class)->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany(User::class)->withTimestamps();
    }
}
