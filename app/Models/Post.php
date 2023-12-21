<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //indique ce qui doit etre obligatoirement remplis
    protected $fillable = ['content', 'user_id', 'image_path'];


    //relation avec la class User
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
