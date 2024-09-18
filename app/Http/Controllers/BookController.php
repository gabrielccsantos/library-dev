<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\BookModel;

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
                
        $bookModel = BookModel::create($bookRequest->all());

        return redirect()->route('book.show', ['bookModel' => $bookModel->id])->with('sucess', "Cadastro realizado com sucesso");
    }

    public function show(BookModel $bookModel){
        return view('book.show', ['bookModel' => $bookModel]);
    }
}
