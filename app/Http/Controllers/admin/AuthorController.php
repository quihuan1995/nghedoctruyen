<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Author\AuthorInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $authorrepository;
    function __construct(AuthorInterface $author)
    {
        $this->authorrepository = $author;
    }

    public function index(){
        $authors = $this->authorrepository->pagination();
        return view('admin.authors.index',compact('authors'));
    }
    public function create(){
        return view('admin.authors.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:authors',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Tác giả này đã có',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->authorrepository->store($request);
        return redirect()->route('admin.author')->with('thongbao','Thêm thành công');
    }

    public function edit($id){
        $author = $this->authorrepository->find($id);
        return view('admin.authors.edit',compact('author'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:authors,name,'.$id,
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Tác giả này đã có',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->authorrepository->update($request, $id);
        return redirect()->route('admin.author')->with('thongbao','Sửa thành công');
    }

    public function delete($id){
        $this->authorrepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }

    public function search(Request $request){
        $authors = $this->authorrepository->search($request);
        return view('admin.authors.index',compact('authors'));
    }
}
