<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{
    private $rolerepository;
    function __construct(RoleInterface $role)
    {
        $this->rolerepository = $role;
    }

    public function index(){
        $roles = $this->rolerepository->pagination();
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],[
            'name.required'=>'Nhập Tên',
            'slug.required'=>'Nhập slug',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->rolerepository->store($request);
        return redirect()->route('admin.role')->with('thongbao','Thêm thành công');
    }

    public function edit($id){
        $role = $this->rolerepository->find($id);
        $roles = Role::all();
        return view('admin.roles.edit',compact('role','roles'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],[
            'name.required'=>'Nhập Tên',
            'slug.required'=>'Nhập slug',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->rolerepository->update($request,$id);
        return redirect()->route('admin.role')->with('thongbao','Sửa thành công');
    }
    public function delete($id){
        $this->rolerepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function search(Request $request){
        $roles = $this->rolerepository->search($request);
        return view('admin.roles.index',compact('roles'));
    }



     //API
    public function api_getAll(){
        return $this->rolerepository->getAll();
    }
    public function api_create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],[
            'name.required'=>'Nhập Tên',
            'slug.required'=>'Nhập slug',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->rolerepository->store($request);
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ],200);
        }
    }

    public function api_show($id){
        return $this->rolerepository->api_show($id);
    }
    public function api_edit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required',
        ],[
            'name.required'=>'Nhập Tên',
            'slug.required'=>'Nhập slug',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->rolerepository->update($request,$id);
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ],200);
        }
    }
    public function api_delete($id){
        return $this->rolerepository->api_delete($id);
    }
}
