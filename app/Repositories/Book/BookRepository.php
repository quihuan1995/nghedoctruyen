<?php
namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Book;

class BookRepository extends BaseRepository implements BookInterface{
    protected $model;

    function __construct(Book $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $Book = new Book();
        $Book->name = $request->name;
        $Book->slug =  str::slug($request->name,'-');
        if($request->hasFile('image')){
            $file = $request->image;
            $filename= str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('image_books/', $filename);
            $Book->image= $filename;
        }
        else {
            $Book->image='no-img.jpg';
        }
        $Book->genres = $request->genres;
        $Book->author_id = $request->author_id;
        $Book->accent_id = $request->accent_id;
        $Book->status = $request->status;
        $Book->content = $request->content;
        $Book->url = 'https://truyenhan.top/book/'.str::slug($request->name,'-').'.html';
        $Book->save();
        $Book->Genre()->attach($request->genre_id);                                         //add select2
    }
    function update(Request $request,$id){
        $Book = $this->model->find($id);
        $Book->name = $request->name;
        $Book->genres = $request->genres;
        $Book->slug =  str::slug($request->name,'-');
        if($request->hasFile('image')){
            if($Book->image !='no-img.jpg'){
                unlink('image_books/'.$Book->image);
            }
            $file = $request->image;
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('image_books/', $filename);
            $Book->image= $filename;
        }
        $Book->author_id = $request->author_id;
        $Book->accent_id = $request->accent_id;
        $Book->status = $request->status;
        $Book->content = $request->content;
        $Book->url = $request->url;
        $Book->Genre()->detach();
        $Book->Genre()->attach($request->genre_id);
        $Book->save();
    }
    function delete($id){
        $Book = $this->model->find($id);
        $Book->Genre()->detach();
        if($Book->image !='no-img.jpg'){
            unlink('image_books/'.$Book->image);
        }
        $Book->delete();
    }


    function filter_book(Request $request){
        if($request->status){
            $filter = $this->model->where('status',$request->status)->get();
        }elseif($request->sort){
            if($request->sort == "view"){
                $filter = $this->model->orderby('listens','desc')->get();
            }elseif($request->sort == "new"){
                $filter = $this->model->orderby('updated_at','desc')->get();
            }elseif($request->sort == "abc"){
                $filter = $this->model->orderby('name','desc')->get();
            }
        }
        return $filter;
    }

    function api_show($id){
        $book = $this->model->where('id',$id)->with('Author','Accent','Chap','Like')->get();
        if($book){
            return response()->json([
                'status' => 200,
                'message' => $book
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy ID'
            ],404);
        }
    }
    function getupdate(){
        return $this->model->orderBy('updated_at', 'desc')->with('Author','Accent','Chap')->get();
    }
    function getlisten(){
        return $this->model->orderBy('listens', 'desc')->with('Author','Accent','Chap')->get();
    }


}
