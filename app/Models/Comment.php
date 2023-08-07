<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'book_id', 'comment'
    ];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
