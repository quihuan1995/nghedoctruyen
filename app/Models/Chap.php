<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chap extends Model
{
    use HasFactory;
    protected $table = 'chaps';

    protected $fillable = [
        'book_id', 'name', 'audio'
    ];

    public function Book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
