<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $table = 'users';

    protected $fillable = [
        'name','email','password','avatar','token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password','token',
    ];
    public function getRememberToken(){
        return $this->token;
    }

    public function setRememberToken($value){
        $this->token = $value;
    }

    public function getRememberTokenName(){
        return 'token';
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function Comment(){
        return $this->hasMany(Comment::class,'user_id');
    }
    public function Like(){
        return $this->hasMany(Like::class,'book_id');
    }
    public function Follow(){
        return $this->hasMany(Follow::class,'book_id');
    }
    public function Role(){
        return $this->belongsToMany(Role::class,'role_user', 'user_id', 'role_id');
    }

    public function hasRole(...$roles){
		foreach($roles as $role){
			if($this->Role->contains('slug',$role)){
				return true;
			}
		}
		return false;
	}
}
