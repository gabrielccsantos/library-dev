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
    Route::get('/books/{book}', 'show')->name('book.show');
    Route::get('/books/{book}/edit', 'edit')->name('book.edit');
    Route::put('/books/{book}/', 'update')->name('book.update');
    Route::delete('/books/{book}', 'destroy')->name('book.destroy');
});