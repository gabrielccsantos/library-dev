<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\BookModel;

class BookController extends Controller
{
    public function index(){
        $books = BookModel::orderBy('created_at')->get();
        return view('book.index', ['books' => $books]);
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

    public function edit(BookModel $bookModel){
        return view('book.edit', ['bookModel' => $bookModel]);
    }

    public function update(BookRequest $bookRequest, BookModel $bookModel){
        $bookRequest->validated();
        
        $bookModel->update([
            'title' => $bookRequest->title,
            'category' => $bookRequest->category,
            'published' => $bookRequest->published,
        ]);

        return redirect()->route('book.show', ['bookModel' => $bookModel->id])->with('sucess', "Edição realizada com sucesso");
    }
}
