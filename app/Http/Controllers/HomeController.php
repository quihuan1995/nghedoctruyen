<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Book\BookInterface;
use App\Repositories\Genre\GenreInterface;
use App\Repositories\User\UserInterface;
use App\Repositories\Chap\ChapInterface;
use App\Repositories\Accent\AccentInterface;
use App\Repositories\Author\AuthorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Gallery;
use App\Mail\MailUser;
use Illuminate\Support\Facades\Mail;
use Exception;

class HomeController extends Controller
{
    private $bookrepository,$genrerepository,$userrepository,$chaprepository,$accentrepository,$authorrepository;
    function __construct(BookInterface $book,GenreInterface $genre,UserInterface $user,ChapInterface $chap,AccentInterface $accent,AuthorInterface $author)
    {
        $this->bookrepository = $book;
        $this->genrerepository = $genre;
        $this->userrepository = $user;
        $this->chaprepository = $chap;
        $this->accentrepository = $accent;
        $this->authorrepository = $author;
    }

    public function index(){
        $getupdates = $this->bookrepository->getupdate();
        $getlistens = $this->bookrepository->getlisten();
        $genres = $this->genrerepository->getAll();
        return view('home.index',compact('genres','getupdates','getlistens'));
    }

    public function new(){
        $genres = $this->genrerepository->getAll();
        $books = $this->bookrepository->new();
        return view('home.new',compact('genres','books'));
    }
    public function genre(){
        $genres = $this->genrerepository->getAll();
        return view('home.genre',compact('genres'));
    }

    public function detail($slug){
        $book = $this->bookrepository->detail($slug);
        $book->listens++;
        $book->save();
        return view('home.detail',compact('book'));
    }

    public function getBookbyGenre($slug){
        $genre = $this->genrerepository->detail($slug);
        $data = $this->genrerepository->getAll();
        return view('home.getBookbyGenre',compact('genre','data'));
    }
    public function getBookbyAuthor($slug){
        $author = $this->authorrepository->detail($slug);
        return view('home.getBookbyAuthor',compact('author'));
    }
    public function getBookbyAccent($slug){
        $accent = $this->accentrepository->detail($slug);
        return view('home.getBookbyAccent',compact('accent'));
    }

    public function filter(){
        $genres = $this->genrerepository->getAll();
        return view('home.filter',compact('genres'));
    }


    public function FacebookLogin(){
        return $this->userrepository->FacebookLogin();
    }

    public function FacebookCallback(){
        $this->userrepository->FacebookCallback();
        return redirect()->route('home');
    }

    public function GoogleLogin(){
        return $this->userrepository->GoogleLogin();
    }

    public function GoogleCallback(){
        $this->userrepository->GoogleCallback();
        return redirect()->route('home');
    }

    function ajax_search(Request $request){
        $books = $this->bookrepository->search($request);
        return view('ajax.ajax_search',compact('books'));
    }

    function ajax_filter_book(Request $request){
        $books = $this->bookrepository->filter_book($request);
        return view('ajax.ajax_filter_book',compact('books'));
    }

    function ajax_filter_getBookbyGenre(Request $request){
        $genre = $this->genrerepository->find($request->genre_id);
        return view('ajax.ajax_getBookbyGenre',compact('genre'));
    }

    function Logout(){
        Auth::logout();
        return redirect('/');
    }


    function api_home(){
        $getupdate_book = $this->bookrepository->getupdate();
        $getlisten_book = $this->bookrepository->getlisten();
        $galleries = Gallery::All();
        if($getupdate_book->count() > 0){
            return response()->json([
                'status' => 200,
                'data'=>[
                    'updated'=>[
                        'category'=>'TRUYỆN MỚI CẬP NHẬP',
                        'books'=>  $getupdate_book,
                    ],
                    'listen'=>[
                        'category'=>'TRUYỆN NGHE NHIỀU NHẤT',
                        'books'=>  $getlisten_book
                    ],
                    'galleries'=>  $galleries
                ],
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'data' => 'Không tìm thấy dữ liệu'
            ],404);
        }
    }

    function ajax_rate(Request $request, $slug){
        $book = $this->bookrepository->detail($slug);
        $book->rates = $request->rate1 + $request->rate2 + $request->rate3 + $request->rate4 + $request->rate5;
        $book->save();
    }
    function comment(Request $request){
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->book_id = $request->book_id;
        $comment->save();
        return redirect()->back();
    }

    function mail(){
        return view('mail');
    }
    function postmail(Request $request){
        $email = $request->email;
        $data = [
            'name' => $request->name,
            'email' => $email
        ];
        try{
            Mail::to($email)->send(new MailUser($data));
            return response()->json(['Success']);
        }catch(Exception $th){
            return response()->json(['False']);
        }
    }
}
