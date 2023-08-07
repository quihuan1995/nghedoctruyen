<?php
namespace App\Repositories\Gallery;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface GalleryInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
}
