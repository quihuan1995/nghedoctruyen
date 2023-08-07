<?php
namespace App\Repositories\Genre;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface GenreInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);

}
