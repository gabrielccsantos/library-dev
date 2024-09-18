<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
});

Route::controller(BookController::class)->group(function(){
    Route::get('/books', 'index')->name('book.index');
    Route::get('/book', 'create')->name('book.create');
    Route::post('/book', 'store')->name('book.store');
});