<?php

namespace App;


class Post extends Model
{

     public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {

     //   $this->comments()->create(compact('body'));

        //Add comment to a post
         Comment::create([
             'body' => $body,
             'post_id' => $this->id,
             'user_id'=> auth()->user()->id

         ]);
    }

    public static function archives(){

        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

    }
/*

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }
}

    */

}