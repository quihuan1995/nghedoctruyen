<?php
namespace App\Repositories\Author;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface AuthorInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
}
