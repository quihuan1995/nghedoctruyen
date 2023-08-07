<?php
namespace App\Repositories\Book;
use Illuminate\Http\Request;
use App\Repositories\BaseInterface;

interface BookInterface extends BaseInterface{
    function store(Request $request);
    function update(Request $request,$id);
    function delete($id);

    function filter_book(Request $request);
    function getupdate();
    function getlisten();
    function api_show($id);
}
