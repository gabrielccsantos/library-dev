<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index(){
        return view('book.index');
    }

    public function create(){
        return view('book.create');
    }

    public function store(BookRequest $bookRequest){
        $bookRequest->validated();
        
    }
}
