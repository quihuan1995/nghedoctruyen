<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Book\BookInterface;
use App\Repositories\Genre\GenreInterface;
use App\Repositories\Accent\AccentInterface;
use App\Repositories\Author\AuthorInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookrepository,$genrerepository,$accentrepository,$authorrepository;
    function __construct(BookInterface $book,GenreInterface $genre,AccentInterface $accent,AuthorInterface $author)
    {
        $this->bookrepository = $book;
        $this->genrerepository = $genre;
        $this->accentrepository = $accent;
        $this->authorrepository = $author;
    }

    public function index(){
        $books = $this->bookrepository->pagination();
        return view('admin.books.index',compact('books'));
    }
    public function create(){
        $genres = $this->genrerepository->getAll();
        $accents = $this->accentrepository->getAll();
        $authors = $this->authorrepository->getAll();
        return view('admin.books.create',compact('genres','accents','authors'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:books',
            'content'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Truyện này đã có',
            'content.required'=>'Nhập Nội dung',
            'image.required'=>'Chọn ảnh',
            'image.mimes'=>'Chỉ được phép dạng jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->bookrepository->store($request);
        return redirect()->route('admin.book')->with('thongbao','Thêm thành công');
    }

    public function edit($id){
        $book = $this->bookrepository->find($id);
        $genres = $this->genrerepository->getAll();
        $accents = $this->accentrepository->getAll();
        $authors = $this->authorrepository->getAll();
        return view('admin.books.edit',compact('book','genres','accents','authors'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:books,name,'.$id,
            'content'=>'required',
            'image'=>'mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Truyện này đã có',
            'content.required'=>'Nhập Nội dung',
            'image.mimes'=>'Chỉ được phép dạng jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->bookrepository->update($request,$id);
        return redirect()->route('admin.book')->with('thongbao','Sửa thành công');
    }
    public function delete($id){
        $this->bookrepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function search(Request $request){
        $books = $this->bookrepository->search($request);
        $genres = $this->genrerepository->getAll();
        return view('admin.books.index',compact('books','genres'));
    }
    // public function filter(Request $request){
    //     $books = $this->bookrepository->filter($request);
    //     $genres = $this->genrerepository->getAll();
    //     return view('admin.books.index',compact('books','genres'));
    // }


        //API
    public function api_getAll(){
        return $this->bookrepository->api_getAll();
    }
    public function api_create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:books'
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Truyện này đã có',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $book = $this->bookrepository->store($request);
            if($book){
                return response()->json([
                    'status' => 500,
                    'message' => 'Vui lòng thử lại'
                ],500);
            }else{
                return response()->json([
                    'status' => 200,
                    'message' => 'Thêm thành công'
                ],200);
            }
        }
    }

    public function api_show($id){
        return $this->bookrepository->api_show($id);
    }
    public function api_edit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:books,name,'.$id,
        ],[
            'name.required'=>'Nhập Tên'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->bookrepository->update($request,$id);
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ],200);
        }
    }
    public function api_delete($id){
        return $this->bookrepository->api_delete($id);
    }


}

