<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Chap\ChapInterface;
use App\Repositories\Book\BookInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapController extends Controller
{
    private $chaprepository,$bookrepository;
    function __construct(ChapInterface $chap,BookInterface $book)
    {
        $this->chaprepository = $chap;
        $this->bookrepository = $book;
    }

    public function index(){
        $chaps = $this->chaprepository->pagination();
        return view('admin.chaps.index',compact('chaps'));
    }
    public function create(){
        $books = $this->bookrepository->getAll();
        return view('admin.chaps.create',compact('books'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:chaps',
            'audio'=>'required|mimes:mp3',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Chap này đã có',
            'audio.required'=>'Chọn audio',
            'audio.mimes'=>'Chỉ được phép dạng mp3',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->chaprepository->store($request);
        return redirect()->route('admin.chap')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $chap = $this->chaprepository->find($id);
        $books = $this->bookrepository->getAll();
        return view('admin.chaps.edit',compact('chap','books'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:chaps,name,'.$id,
            'audio'=>'required|mimes:mp3',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Chap này đã có',
            'audio.required'=>'Chọn audio',
            'audio.mimes'=>'Chỉ được phép dạng mp3',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->chaprepository->update($request,$id);
        return redirect()->route('admin.chap')->with('thongbao','Sửa thành công');
    }
    public function delete($id){
        $this->chaprepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function search(Request $request){
        $chaps = $this->chaprepository->search($request);
        return view('admin.chaps.index',compact('chaps'));
    }



    //API
    public function api_getAll(){
        return $this->chaprepository->getAll();
    }
    public function api_create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:chaps',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Chap này đã có',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->chaprepository->store($request);
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ],200);
        }
    }

    public function api_show($id){
        return $this->chaprepository->api_show($id);
    }
    public function api_edit(Request $request,$id){
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
            $this->chaprepository->update($request,$id);
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ],200);
        }
    }
    public function api_delete($id){
        return $this->chaprepository->api_delete($id);
    }
}
