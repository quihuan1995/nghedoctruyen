<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{AdminController,UserController,GenreController,BookController,ChapController,RoleController};
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AdminController::class, 'api_login'])->middleware('cors');

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['prefix' => 'genre'], function () {
        Route::get('/',[GenreController::class,'api_getAll']);
        Route::post('/',[GenreController::class,'api_create']);
        Route::get('/{id}',[GenreController::class,'api_show']);
        Route::post('/{id}', [GenreController::class, 'api_edit']);
        Route::delete('/{id}', [GenreController::class, 'api_delete']);

    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class,'api_getAll']);
        Route::post('/',[UserController::class,'api_create']);
        Route::get('/{id}',[UserController::class,'api_show']);
        Route::post('/{id}', [UserController::class, 'api_edit']);
        Route::delete('/{id}', [UserController::class, 'api_delete']);
    });


    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [BookController::class,'api_getAll']);
        Route::post('/',[BookController::class,'api_create']);
        Route::get('/{id}',[BookController::class,'api_show']);
        Route::post('/{id}', [BookController::class, 'api_edit']);
        Route::delete('/{id}', [BookController::class, 'api_delete']);
    });
    Route::group(['prefix' => 'chap'], function () {
        Route::get('/', [ChapController::class,'api_getAll']);
        Route::post('/',[ChapController::class,'api_create']);
        Route::get('/{id}',[ChapController::class,'api_show']);
        Route::post('/{id}', [ChapController::class, 'api_edit']);
        Route::delete('/{id}', [ChapController::class, 'api_delete']);
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class,'api_getAll']);
        Route::post('/',[RoleController::class,'api_create']);
        Route::get('/{id}',[RoleController::class,'api_show']);
        Route::post('/{id}', [RoleController::class, 'api_edit']);
        Route::delete('/{id}', [RoleController::class, 'api_delete']);
    });

    Route::post('/logout', [AdminController::class, 'api_logout']);

    Route::get('/',[HomeController::class,'api_home']);
});
