<?php
namespace App\Repositories\Chap;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface ChapInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
}
