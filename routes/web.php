<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{bookModel}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/{bookModel}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{bookModel}/', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{bookModel}', [BookController::class, 'destroy'])->name('book.destroy');