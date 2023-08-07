<?php
namespace App\Repositories\Genre;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreRepository extends BaseRepository implements GenreInterface{
    protected $model;

    function __construct(Genre $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){

        $genre = new Genre();
        $genre->name = $request->name;
        $genre->slug =  str::slug($request->name,'-');
        $genre->save();
    }
    function update(Request $request,$id){
        $Genre = $this->model->find($id);
        $Genre->name = $request->name;
        $Genre->slug =  str::slug($request->name,'-');
        $Genre->save();
    }
    function delete($id){
        $Genre = $this->model->find($id);
        $Genre->delete();
    }


    function api_create(Request $request){
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->image = $request->image;
        $genre->save();
    }
    function api_edit(Request $request,$id){
        $genre = $this->model->find($id);
        $genre->name = $request->name;
        $genre->image = $request->image;
        $genre->save();
    }
}
