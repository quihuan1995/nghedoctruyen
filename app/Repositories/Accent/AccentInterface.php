<?php
namespace App\Repositories\Accent;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface AccentInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
}
