<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Accent\AccentInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccentController extends Controller
{
    private $accentrepository;
    function __construct(AccentInterface $accent)
    {
        $this->accentrepository = $accent;
    }

    public function index(){
        $accents = $this->accentrepository->pagination();
        return view('admin.accents.index',compact('accents'));
    }
    public function create(){
        return view('admin.accents.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:accents',
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Người đọc này đã có',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->accentrepository->store($request);
        return redirect()->route('admin.accent')->with('thongbao','Thêm thành công');
    }

    public function edit($id){
        $accent = $this->accentrepository->find($id);
        return view('admin.accents.edit',compact('accent'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:accents,name,'.$id,
        ],[
            'name.required'=>'Nhập Tên',
            'name.unique'=>'Người đọc này đã có',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->accentrepository->update($request, $id);
        return redirect()->route('admin.accent')->with('thongbao','Sửa thành công');
    }

    public function delete($id){
        $this->accentrepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }

    public function search(Request $request){
        $accents = $this->accentrepository->search($request);
        return view('admin.accents.index',compact('accents'));
    }
}
