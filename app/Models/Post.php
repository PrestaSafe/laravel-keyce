<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * HasOne
     * return User::class
     */
    public function author()
    {
        // id: table user
        // user_id: table posts
        return $this->hasOne(User::class,'id','user_id');
    } 
}
