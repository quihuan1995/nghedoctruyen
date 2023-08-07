<?php
namespace App\Repositories\Role;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface RoleInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
}
