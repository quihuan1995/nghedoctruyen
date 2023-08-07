<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name', 'image','status','listens','slug','content','author_id','accent_id'
    ];
    public function Genre(){
        return $this->belongsToMany(Genre::class,'genre_book', 'book_id', 'genre_id');
    }
    public function Accent(){
        return $this->belongsTo(Accent::class,'accent_id');
    }
    public function Author(){
        return $this->belongsTo(Author::class,'author_id');
    }
    public function Chap(){
        return $this->hasMany(Chap::class,'book_id');
    }
    public function Comment(){
        return $this->hasMany(Comment::class,'book_id');
    }
    public function Like(){
        return $this->hasMany(Like::class,'book_id');
    }
    public function Follow(){
        return $this->hasMany(Follow::class,'book_id');
    }
}
