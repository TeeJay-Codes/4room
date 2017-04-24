<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = []; // for now tho

    /**
     * Simple help to spit out a thread path
     *
     * @return string
     */
    public function path()
    {
    	return '/threads/' . $this->id;
    }

    /**
     * A thread has many replies
     *
     * @return mixed
     */
    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }

    /**
     * A thread belongs to a user, ie creator
     *
     * @return mixed
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Add reply to a given thread
     *
     */
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
