<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',

        'title',
        'body',
        'avatar',

        'street',
        'city',
        'state',
        'zip',
        'country',
        'facebook',
        'twitter',
        'linkedin',
        'googleplus',
        'github',
        'stackoverflow',
        'website',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function isWorker()
    {
        return $this->roles()->where('name', 'worker')->exists();
    }

    public function isEmployer()
    {
        return $this->roles()->where('name', 'employer')->exists();
    }

    public function jobBids()
    {
        
        return $this->belongsToMany(Job::class)
                    ->withPivot('bid_amount', 'bid_message', 'accepted_at', 'completed_at')
                    ->withTimestamps();
    
    }

}
