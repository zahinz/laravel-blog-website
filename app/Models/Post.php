<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // connect with the factory
    use HasFactory;

    // database named 'body'
    protected $fillable = [
        'body'
    ];

    // post relation with user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // post relation with likes model
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // check whether the post been liked by a user and return into boolean
    public function likedBy(User $user) 
    {
        return $this->likes->contains('user_id', $user->id);
    }

    // ? transferred into policies
    // public function ownedBy(User $user)
    // {
    //     return $user->id === $this->user_id;
    // }
}
