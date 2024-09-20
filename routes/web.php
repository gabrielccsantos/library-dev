<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::controller(BookController::class)->group(function(){
    Route::get('/books', 'index')->name('book.index');
    Route::get('/books/create', 'create')->name('book.create');
    Route::post('/books', 'store')->name('book.store');
    Route::get('/books/{bookModel}', 'show')->name('book.show');
    Route::get('/books/{bookModel}/edit', 'edit')->name('book.edit');
    Route::put('/books/{bookModel}/', 'update')->name('book.update');
    Route::delete('/books/{bookModel}', 'destroy')->name('book.destroy');
});