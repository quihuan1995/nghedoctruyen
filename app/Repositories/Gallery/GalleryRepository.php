<?php
namespace App\Repositories\Gallery;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryRepository extends BaseRepository implements GalleryInterface{
    protected $model;

    function __construct(Gallery $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){

        $Gallery = new Gallery();
        if($request->hasFile('image')){
            $file = $request->image;
            $filename= str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('galleries/', $filename);
            $Gallery->image= $filename;
        }
        else {
            $Gallery->image='no-img.jpg';
        }
        $Gallery->path= 'https://truyenhan.top/galleries/';
        $Gallery->save();
    }
    function update(Request $request,$id){
        $Gallery = $this->model->find($id);
        if($request->hasFile('image')){
            if($Gallery->image !='no-img.jpg'){
                unlink('galleries/'.$Gallery->image);
            }
            $file = $request->image;
            $filename= Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->move('galleries/', $filename);
            $Gallery->image= $filename;
        }
        $Gallery->path= $request->path;
        $Gallery->save();
    }
    function delete($id){
        $Gallery = $this->model->find($id);
        $Gallery->delete();
    }

}
