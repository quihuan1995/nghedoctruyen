<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use App\Repositories\Role\RoleInterface;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private $userrepository,$rolerepository;
    function __construct(UserInterface $user,RoleInterface $role)
    {
        $this->userrepository = $user;
        $this->rolerepository = $role;
    }

    public function index(){
        $users = $this->userrepository->pagination();
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        $roles = $this->rolerepository->getAll();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'avatar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ],[
            'name.required'=>'Nhập Tên',
            'email.required'=>'Nhập Email',
            'email.unique'=>'Email đã tồn tại',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Nhập password',
            'password.min'=>'Password phai 6 ky tu',
            'avatar.image'=>'Phải là ảnh jpg,png,jpeg',
            'avatar.mimes'=>'Chỉ được phép dạng jpg,png,jpeg',
            'avatar.max'=>'Chỉ tối đa 2M',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->userrepository->store($request);
        return redirect()->route('admin.user')->with('thongbao','Thêm thành công');
    }
    public function edit($id){
        $user = $this->userrepository->find($id);
        $roles = $this->rolerepository->getAll();
        return view('admin.users.edit',compact('user','roles'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'avatar' => 'image|mimes:jpg,png,jpeg|max:2048'
        ],[
            'name.required'=>'Nhập Tên',
            'email.required'=>'Nhập Email',
            'email.unique'=>'Email đã tồn tại',
            'email.email'=>'Email không đúng định dạng',
            'avatar.image'=>'Phải là ảnh jpg,png,jpeg',
            'avatar.mimes'=>'Chỉ được phép dạng jpg,png,jpeg',
            'avatar.max'=>'Chỉ tối đa 2M',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->userrepository->update($request,$id);
        return redirect()->route('admin.user')->with('thongbao','Sửa thành công');
    }
    public function delete($id){
        $this->userrepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
    public function search(Request $request){
        $users = $this->userrepository->search($request);
        return view('admin.users.index',compact('users'));
    }

    public function getchangepass($id){
        $user = $this->userrepository->find($id);
        return view('admin.users.changepass',compact('user'));
    }
    public function postchangepass(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'old_pass'=>'required',
            'new_pass'=>'required|min:6',
            'new_repass'=>'required|same:new_pass'
        ],[
            'old_pass.required'=>'Nhập Mật khẩu cũ',
            'new_pass.min'=>'Mật khẩu phải 6 ky tu',
            'new_pass.required'=>'Nhập Mật khẩu mới',
            'new_repass.required'=>'Nhập lại Mật khẩu mới',
            'new_repass.same'=>'Mật khẩu không chùng khớp',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->userrepository->find($id);
        $old_pass = $request->input('old_pass');
        if(!Hash::check($old_pass,$user->password)){
            return redirect()->back()->withInput()->with('wrongpass','Mật khẩu cũ không đúng');
        }else{
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('admin.user')->with('thongbao','Sửa thành công');
        }
    }


    //API
    public function api_getAll(){
        return $this->userrepository->api_getAll();

    }

    public function api_create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ],[
            'name.required'=>'Nhập Tên',
            'email.required'=>'Nhập Email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Nhập password',
            'password.min'=>'Password phai 6 ky tu',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->userrepository->store($request);
            return response()->json([
                'status' => 200,
                'message' => 'Thêm thành công'
            ],200);
        }
    }

    public function api_show($id){
        return $this->userrepository->api_show($id);
    }
    public function api_edit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
        ],[
            'name.required'=>'Nhập Tên',
            'email.required'=>'Nhập Email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ],422);
        }else{
            $this->userrepository->update($request,$id);
            return response()->json([
                'status' => 200,
                'message' => 'Sửa thành công'
            ],200);

        }
    }
    public function api_delete($id){
        return $this->userrepository->api_delete($id);
    }
}
