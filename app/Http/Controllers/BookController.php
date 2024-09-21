<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at')->get();
        return view('book.index', ['books' => $books]);
    }

    public function create(){
        return view('book.create');
    }

    public function store(BookRequest $bookRequest)
    {
        
        $bookRequest->validated();
                
        $book = Book::create($bookRequest->all());

        return redirect()->route('book.show', ['book' => $book->id])->with('sucess', "Cadastro realizado com sucesso");
    }

    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    public function update(BookRequest $bookRequest, Book $book)
    {
        $bookRequest->validated();
        
        $book->update([
            'title' => $bookRequest->title,
            'category' => $bookRequest->category,
            'published' => $bookRequest->published,
        ]);

        return redirect()->route('book.show', ['book' => $book->id])->with('sucess', "Edição realizada com sucesso");
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('sucess', "Livro excluído com sucesso");
    }
}
