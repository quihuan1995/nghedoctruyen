<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseRepository implements BaseInterface{

    protected $model;
    function __construct(Model $model)
    {
        $this->model = $model;
    }

    function getAll(){
        return $this->model->all();
    }
    function pagination(){
        return $this->model->paginate(20);
    }
    function find($id){
        return $this->model->findOrFail($id);
    }
    function search(Request $request){
        return $this->model->where('name','like','%'.$request->key.'%')->paginate(20);
    }
    function new(){
        return $this->model->orderBy('created_at', 'desc')->get();
    }
    function countall(){
        return $this->model->all()->count();
    }
    function detail($slug){
        return $this->model->where("slug",$slug)->first();
    }
    // function search(Request $request){
    //     $key = $request->key;
    //     $search = $this->model->where('name','like','%'.$key.'%')
    //     ->orWhereHas('Genre',function($q) use($key){                                    // search Book and Genre
    //         $q->where('name',$key);
    //     })
    //     ->paginate(10);

    //     return $search;
    // }

    public function api_getAll(){
        $getall = $this->model->all();
        if($getall->count() > 0){
            return response()->json([
                'status' => 200,
                'message' => $getall
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy dữ liệu'
            ],404);
        }
    }

    public function api_show($id){
        $find = $this->model->findOrFail($id);
        if($find){
            return response()->json([
                'status' => 200,
                'message' => $find
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy ID'
            ],404);
        }
    }
    public function api_delete($id){
        $find = $this->model->findOrFail($id);
        if($find){
            $find->delete($id);
            return response()->json([
                'status' => 200,
                'message' => 'Xóa thành công'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy ID'
            ],404);
        }
    }

}
