<?php
namespace App\Repositories\Author;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Author;

class AuthorRepository extends BaseRepository implements AuthorInterface{
    protected $model;

    function __construct(Author $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $Author = new Author();
        $Author->name = $request->name;
        $Author->slug =  Str::slug($request->name,'-');
        $Author->save();
    }
    function update(Request $request,$id){
        $Author = $this->model->find($id);
        $Author->name = $request->name;
        $Author->slug =  Str::slug($request->name,'-');
        $Author->save();
    }

    function delete($id){
        $Author = $this->model->find($id);
        $Author->delete();
    }
}
