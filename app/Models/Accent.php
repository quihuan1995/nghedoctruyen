<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accent extends Model
{
    use HasFactory;
    protected $table = 'accents';

    protected $fillable = [
        'name','slug'
    ];

    public function Book(){
        return $this->hasMany(Book::class,'accent_id');
    }
}
