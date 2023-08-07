<?php
namespace App\Repositories\Accent;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Accent;

class AccentRepository extends BaseRepository implements AccentInterface{
    protected $model;

    function __construct(Accent $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $Accent = new Accent();
        $Accent->name = $request->name;
        $Accent->slug =  str::slug($request->name,'-');
        $Accent->save();
    }
    function update(Request $request,$id){
        $Accent = $this->model->find($id);
        $Accent->name = $request->name;
        $Accent->slug =  str::slug($request->name,'-');
        $Accent->save();
    }

    function delete($id){
        $Accent = $this->model->find($id);
        $Accent->delete();
    }
}
