<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Genre\GenreInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    private $genrerepository;
    function __construct(GenreInterface $genre)
    {
        $this->genrerepository = $genre;
    }

    public function index(){
        $genres = $this->genrerepository->pagination();
        return view('admin.genres.index',compact('genres'));
    }

    public function create(){
        return view('admin.genres.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:genres',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Thể loại này đã có',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->genrerepository->store($request);
        return redirect()->route('admin.genre')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $genre = $this->genrerepository->find($id);
        return view('admin.genres.edit',compact('genre'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:genres,name,'.$id,
        ],[
            'name.required'=>'Nhập Tên',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->genrerepository->update($request,$id);
        return redirect()->route('admin.genre')->with('thongbao','Sửa thành công');
    }
    public function delete($id){
        $this->genrerepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function search(Request $request){
        $genres = $this->genrerepository->search($request);
        return view('admin.genres.index',compact('genres'));
    }



    //API
    public function api_getAll(){
        return $this->genrerepository->getAll();
    }
    public function api_create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required'
        ],[
            'name.required'=>'Nhập Tên'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->genrerepository->store($request);
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ],200);
        }
    }

    public function api_show($id){
        return $this->genrerepository->api_show($id);
    }
    public function api_edit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:genres,name,'.$id,
        ],[
            'name.required'=>'Nhập Tên'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->genrerepository->update($request,$id);
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ],200);
        }
    }
    public function api_delete($id){
        return $this->genrerepository->api_delete($id);
    }
}
