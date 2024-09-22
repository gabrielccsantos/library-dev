<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->orderBy('created_at')->get();
        return view('book.index', ['books' => $books]);
    }

    public function create(){
        $categories = Category::all();
        $authors = Author::all();
        return view('book.create', compact('categories', 'authors'));
    }

    public function store(BookRequest $bookRequest)
    {
        
        $bookRequest->validated();
                
        $book = Book::create($bookRequest->all());

        $book->authors()->attach($bookRequest->input('authors'));

        return redirect()->route('book.show', ['book' => $book->id])->with('sucess', "Cadastro realizado com sucesso");
    }

    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'categories' => $categories, 'authors' => $authors]);
    }

    public function update(BookRequest $bookRequest, Book $book)
    {
        $bookRequest->validated();
        
        $book->update([
            'title' => $bookRequest->title,
            'published' => $bookRequest->published,
            'category_id' => $bookRequest->category_id,
        ]);

        $book->authors()->sync($bookRequest->authors);

        return redirect()->route('book.show', ['book' => $book->id])->with('sucess', "Edição realizada com sucesso");
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('sucess', "Livro excluído com sucesso");
    }
}
