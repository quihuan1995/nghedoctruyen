<?php
namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleInterface{
    protected $model;

    function __construct(Role $model)
    {
        parent::__construct($model);
    }

    function store(Request $request){
        $Role = new Role();
        $Role->name = $request->name;
        $Role->slug = $request->slug;
        $Role->save();
    }
    function update(Request $request,$id){
        $Role = $this->model->find($id);
        $Role->name = $request->name;
        $Role->slug = $request->slug;
        $Role->save();
    }

    function delete($id){
        $Role = $this->model->find($id);
        $Role->delete();
    }
}
