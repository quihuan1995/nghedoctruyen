<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{AdminController,UserController,GenreController,BookController,ChapController,RoleController,GalleryController,AccentController,AuthorController};
use App\Http\Controllers\HomeController;


//Facebook
Route::get('facebook',[HomeController::class,'FacebookLogin'])->name('facebook.login');
Route::get('facebook/callback',[HomeController::class,'FacebookCallback'])->name('facebook.callback');


//Google
Route::get('google',[HomeController::class,'GoogleLogin'])->name('google.login');
Route::get('google/callback',[HomeController::class,'GoogleCallback'])->name('google.callback');

//Admin
Route::get('adminlogin',[AdminController::class,'getLogin'])->middleware('checklogout');
Route::post('adminlogin',[AdminController::class,'PostLogin'])->name('adminpostlogin');
Route::get('adminlogout',[AdminController::class,'logout'])->name('adminlogout');

Route::group(['prefix' => 'admin','middleware'=>'checklogin'], function () {

    Route::get('/',[AdminController::class,'index'])->name('admin')->middleware('role:admin');

    Route::group(['prefix' => 'genre','middleware'=>'role:genre'], function () {
        Route::get('/',[GenreController::class,'index'])->name('admin.genre');
        Route::get('/create',[GenreController::class,'create'])->name('admin.genre.create');
        Route::post('/create',[GenreController::class,'store'])->name('admin.genre.store');
        Route::get('/edit/{id}',[GenreController::class,'edit'])->name('admin.genre.edit');
        Route::post('/edit/{id}', [GenreController::class, 'update'])->name('admin.genre.update');
        Route::get('/delete/{id}', [GenreController::class, 'delete'])->name('admin.genre.delete');
        Route::post('/',[GenreController::class,'search'])->name('admin.genre.search');
    });


    Route::group(['prefix' => 'book','middleware'=>'role:book'], function () {
        Route::get('/',[BookController::class,'index'])->name('admin.book');
        Route::get('/create',[BookController::class,'create'])->name('admin.book.create');
        Route::post('/create',[BookController::class,'store'])->name('admin.book.store');
        Route::get('/edit/{id}',[BookController::class,'edit'])->name('admin.book.edit');
        Route::post('/edit/{id}', [BookController::class, 'update'])->name('admin.book.update');
        Route::get('/delete/{id}', [BookController::class, 'delete'])->name('admin.book.delete');
        Route::post('/',[BookController::class,'search'])->name('admin.book.search');
    });

    Route::group(['prefix' => 'chap','middleware'=>'role:chap'], function () {
        Route::get('/',[ChapController::class,'index'])->name('admin.chap');
        Route::get('/create',[ChapController::class,'create'])->name('admin.chap.create');
        Route::post('/create',[ChapController::class,'store'])->name('admin.chap.store');
        Route::get('/edit/{id}',[ChapController::class,'edit'])->name('admin.chap.edit');
        Route::post('/edit/{id}', [ChapController::class, 'update'])->name('admin.chap.update');
        Route::get('/delete/{id}', [ChapController::class, 'delete'])->name('admin.chap.delete');
        Route::post('/',[ChapController::class,'search'])->name('admin.chap.search');
    });

    Route::group(['prefix' => 'user','middleware'=>'role:user'], function () {
        Route::get('/',[UserController::class,'index'])->name('admin.user');
        Route::get('/create',[UserController::class,'create'])->name('admin.user.create');
        Route::post('/create',[UserController::class,'store'])->name('admin.user.store');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');

        Route::get('/changepass/{id}', [UserController::class, 'getchangePass'])->name('admin.user.getchangepass');
        Route::post('/changepass/{id}', [UserController::class, 'postchangePass'])->name('admin.user.postchangepass');

        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/',[UserController::class,'search'])->name('admin.user.search');
    });

    Route::group(['prefix' => 'accent','middleware'=>'role:accent'], function () {
        Route::get('/',[AccentController::class,'index'])->name('admin.accent');
        Route::get('/create',[AccentController::class,'create'])->name('admin.accent.create');
        Route::post('/create',[AccentController::class,'store'])->name('admin.accent.store');
        Route::get('/edit/{id}',[AccentController::class,'edit'])->name('admin.accent.edit');
        Route::post('/edit/{id}', [AccentController::class, 'update'])->name('admin.accent.update');
        Route::get('/delete/{id}', [AccentController::class, 'delete'])->name('admin.accent.delete');
        Route::post('/',[AccentController::class,'search'])->name('admin.accent.search');
    });

    Route::group(['prefix' => 'author','middleware'=>'role:author'], function () {
        Route::get('/',[AuthorController::class,'index'])->name('admin.author');
        Route::get('/create',[AuthorController::class,'create'])->name('admin.author.create');
        Route::post('/create',[AuthorController::class,'store'])->name('admin.author.store');
        Route::get('/edit/{id}',[AuthorController::class,'edit'])->name('admin.author.edit');
        Route::post('/edit/{id}', [AuthorController::class, 'update'])->name('admin.author.update');
        Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('admin.author.delete');
        Route::post('/',[AuthorController::class,'search'])->name('admin.author.search');
    });

    Route::group(['prefix' => 'role','middleware'=>'role:role'], function () {
        Route::get('/',[RoleController::class,'index'])->name('admin.role');
        Route::get('/create',[RoleController::class,'create'])->name('admin.role.create');
        Route::post('/create',[RoleController::class,'store'])->name('admin.role.store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('admin.role.edit');
        Route::post('/edit/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::post('/',[RoleController::class,'search'])->name('admin.role.search');
    });

    Route::group(['prefix' => 'gallery','middleware'=>'role:gallery'], function () {
        Route::get('/',[GalleryController::class,'index'])->name('admin.gallery');
        Route::get('/create',[GalleryController::class,'create'])->name('admin.gallery.create');
        Route::post('/create',[GalleryController::class,'store'])->name('admin.gallery.store');
        Route::get('/edit/{id}',[GalleryController::class,'edit'])->name('admin.gallery.edit');
        Route::post('/edit/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::get('/delete/{id}', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
    });
});


//Home
Route::group(['prefix' => '/',], function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/new',[HomeController::class,'new'])->name('home.new');
    Route::get('/book/{slug}.html', [HomeController::class, 'detail'])->name('home.book');
    Route::post('/book/comment', [HomeController::class, 'comment'])->name('home.book.comment');
    Route::get('/genre',[HomeController::class,'genre'])->name('home.genre');
    Route::get('/genre/{slug}.html',[HomeController::class,'getBookbyGenre'])->name('home.genre.getBookbyGenre');
    Route::get('/author/{slug}.html',[HomeController::class,'getBookbyAuthor'])->name('home.genre.getBookbyAuthor');
    Route::get('/accent/{slug}.html',[HomeController::class,'getBookbyAccent'])->name('home.genre.getBookbyAccent');
    Route::get('/filter',[HomeController::class,'filter'])->name('home.filter');
    Route::get('homelogout',[HomeController::class,'logout'])->name('homelogout');

    Route::get('/ajax_search',[HomeController::class,'ajax_search'])->name('home.ajax_search');
    Route::get('/ajax_filter_book',[HomeController::class,'ajax_filter_book'])->name('home.ajax_filter_book');
    Route::get('/ajax_filter_getBookbyGenre',[HomeController::class,'ajax_filter_getBookbyGenre'])->name('home.ajax_filter_getBookbyGenre');
    Route::post('/ajax_rate/{slug}', [HomeController::class, 'ajax_rate'])->name('home.ajax_rate');

    Route::get('/mail',[HomeController::class,'mail'])->name('mail');
    Route::post('/mail',[HomeController::class,'postmail'])->name('postmail');
});

