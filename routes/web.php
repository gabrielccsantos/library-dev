<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::get('/book-index', [BookController::class, 'index'])->name('book.index');
Route::get('/book-create', [BookController::class, 'create'])->name('book.create');
Route::post('/book-store', [BookController::class, 'store'])->name('book.store');
Route::get('/book-show/{bookModel}', [BookController::class, 'show'])->name('book.show');