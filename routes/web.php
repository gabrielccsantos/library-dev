<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index')->name('category.index');
    Route::get('/categories/create', 'create')->name('category.create');
    Route::post('/categories', 'store')->name('category.store');
    Route::get('/categories/{category}', 'show')->name('category.show');
    Route::get('/categories/{category}/edit', 'edit')->name('category.edit');
    Route::put('/categories/{category}/', 'update')->name('category.update');
    Route::delete('/categories/{category}', 'destroy')->name('category.destroy');
});