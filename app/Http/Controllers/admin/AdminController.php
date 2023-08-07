<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Book\BookInterface;
use App\Repositories\Genre\GenreInterface;
use App\Repositories\User\UserInterface;
use App\Models\User;

class AdminController extends Controller
{
    private $bookrepository,$genrerepository,$userrepository;
    function __construct(BookInterface $book,GenreInterface $genre,UserInterface $user)
    {
        $this->bookrepository = $book;
        $this->genrerepository = $genre;
        $this->userrepository = $user;
    }

    public function index(){
        $books = $this->bookrepository->countall();
        $genres = $this->genrerepository->countall();
        $users = $this->userrepository->countall();

        return view('admin.index',compact('genres','books','users'));
    }
    public function getLogin(){
        return view('admin.login');
    }

    function PostLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|exists:users',
            'password'=>'required|min:6|'
        ],[
            'email.required'=>'Nhap Email',
            'email.exists'=>'Sai Email',
            'password.required'=>'Nhap password',
            'password.min'=>'Password phai 6 ky tu',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();

        /// Mật khẩu không đúng
        if(!Hash::check($password,$user->password)){
            return redirect()->back()->withInput()->with('thongbao','Sai Password');
        }

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            Auth::login($user);
            return redirect()->route('admin');
        }
    }

    function Logout(){
        Auth::logout();
        return redirect('/adminlogin');
    }

    function api_login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|exists:users',
            'password'=>'required|min:6|'
        ],[
            'email.required'=>'Nhap Email',
            'email.exists'=>'Sai Email',
            'password.required'=>'Nhap password',
            'password.min'=>'Password phai 6 ky tu',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();

        /// Mật khẩu không đúng
        if(!Hash::check($password,$user->password)){
            return response([
                'message' => 'Sai mật khẩu'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'Đăng nhập thành công',
            'token' => $token
        ],200);
    }

    function api_logout(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Đăng xuất'
        ],200);
    }
}
