<?php
namespace App\Repositories\User;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface UserInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);
    function FacebookLogin();
    function FacebookCallback();
    function GoogleLogin();
    function GoogleCallback();
}
