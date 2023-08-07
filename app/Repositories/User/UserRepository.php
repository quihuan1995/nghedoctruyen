<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface{
    protected $model;

    function __construct(User $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $filename= str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('avatar_users/', $filename);
            $user->avatar= $filename;
        }
        else {
            $user->avatar='no-avatar.png';
        }
        $user->save();
        $user->Role()->attach($request->role_id);
    }
    function update(Request $request,$id){
        $user = $this->model->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->hasFile('avatar')){
            if($user->avatar!='no-avatar.png' && !str_contains($user->avatar, 'https')){
                unlink('avatar_users/'.$user->avatar);
            }
            $file = $request->file('avatar');
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('avatar_users/', $filename);
            $user->avatar= $filename;
        }
        $user->save();
        $user->Role()->detach();
        $user->Role()->attach($request->role_id);
    }

    function delete($id){
        $user = $this->model->find($id);
        $user->Role()->detach();
        if($user->avatar!='no-avatar.png' && !str_contains($user->avatar, 'https')){
            unlink('avatar_users/'.$user->avatar);
        }
        $user->delete();
    }



    public function FacebookLogin(){
        return Socialite::driver('facebook')->redirect();
    }

    public function FacebookCallback(){
        try{
            $user= Socialite::driver('facebook')->user();
        }catch(\Exception $e){
            return redirect()->route('home');
        }
        $exituser = User::where('email', $user->email)->first();
        if($exituser){
            auth()->login($exituser,true);
        }else{
            $newuser = new User;
            $newuser->name = $user->name;
            $newuser->email = $user->email;
            $newuser->token= $user->id;
            $newuser->password = Hash::make($user->getName().'@'.$user->getId());
            $newuser->avatar = $user->avatar;
            $newuser->save();
            auth()->login($newuser, true);
        }
    }

    public function GoogleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function GoogleCallback(){
        try{
            $user= Socialite::driver('google')->user();
        }catch(\Exception $e){
            return redirect()->route('home');
        }
        $exituser = User::where('email', $user->email)->first();
        if($exituser){
            auth()->login($exituser,true);
        }else{
            $newuser = new User;
            $newuser->name = $user->name;
            $newuser->email = $user->email;
            $newuser->token = $user->id;
            $newuser->password = Hash::make($user->getName().'@'.$user->getId());
            $newuser->avatar = $user->avatar;
            $newuser->save();
            auth()->login($newuser, true);
        }
    }
}
