<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];

    public function posts()
{
    return $this->hasMany(Post::class);
}

public function comment(){
    return $this->hashMany(Post::class);
}

}
