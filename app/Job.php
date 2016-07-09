<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'deadline_at',
    	'user_id'
    ];

    protected $dates = [
    	'deadline_at',
    	'created_at',
    	'updated_at'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('bid_amount', 'bid_message', 'accepted_at', 'completed_at')
                    ->withTimestamps();
    }

}
