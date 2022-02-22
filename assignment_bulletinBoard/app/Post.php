<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id');
    }

    /**
     * @return bool
     */
    public function is_like()
    {
        $user = Auth::id();

        $likes = array();
        foreach ($this->likes as $like)
        {
            array_push($likes, $like->user_id);
        }

        if (in_array($user, $likes))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
