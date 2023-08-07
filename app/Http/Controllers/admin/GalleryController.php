<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Gallery\GalleryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $galleryrepository;
    function __construct(GalleryInterface $gallery)
    {
        $this->galleryrepository = $gallery;
    }

    public function index(){
        $galleries = $this->galleryrepository->pagination();
        return view('admin.galleries.index',compact('galleries'));
    }
    public function create(){
        return view('admin.galleries.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image'=>'required|mimes:jpg,jpeg,png',
        ],[
            'image.required'=>'Nhập Tên',
            'image.mimes'=>'Chỉ được phép dạng jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->galleryrepository->store($request);
        return redirect()->route('admin.gallery')->with('thongbao','Thêm thành công');
    }

    public function edit($id){
        $gallery = $this->galleryrepository->find($id);
        return view('admin.galleries.edit',compact('gallery'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'image'=>'required|mimes:jpg,jpeg,png',
        ],[
            'image.required'=>'Nhập Tên',
            'image.mimes'=>'Chỉ được phép dạng jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->galleryrepository->update($request, $id);
        return redirect()->route('admin.gallery')->with('thongbao','Sửa thành công');
    }

    public function delete($id){
        $this->galleryrepository->delete($id);
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
}
