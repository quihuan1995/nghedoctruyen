<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface BaseInterface{
    function getAll();
    function pagination();
    function find($id);
    function search(Request $request);
    function new();
    function countall();
    function detail($slug);

    function api_getAll();
    function api_show($id);
    function api_delete($id);
}
