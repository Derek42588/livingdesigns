<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body','slug', 'imageLink', 'imageAlt'];

    public function path() {
        return route('blog.show', $this);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // a post has many tags
// tag belong to a post?  or to many posts?

// we have a post called Learn Laravel
//i it has tags:
// php, laravel, work, education
// those tags could belong to many articles

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}

