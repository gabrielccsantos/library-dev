<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('created_at')->get();
        return view('author.index', ['authors' => $authors]);
    }

    public function create(){
        return view('author.create');
    }

    public function store(AuthorRequest $authorRequest)
    {
        
        $authorRequest->validated();
                
        $author = Author::create($authorRequest->all());

        return redirect()->route('author.show', ['author' => $author->id])->with('sucess', "Cadastro realizado com sucesso");
    }

    public function show(Author $author)
    {
        return view('author.show', ['author' => $author]);
    }

    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    public function update(AuthorRequest $authorRequest, Author $author)
    {
        $authorRequest->validated();
        
        $author->update([
            'name' => $authorRequest->name
        ]);

        return redirect()->route('author.show', ['author' => $author->id])->with('sucess', "Edição realizada com sucesso");
    }

    public function destroy(Author $author)
    {
        if ($author->books()->count() > 0) {
            return redirect()->route('category.index')->with('unsucess', 'Não é possível excluir a categoria. Existem livros relacionados a ela.');
        }
        
        $author->delete();

        return redirect()->route('author.index')->with('sucess', "Autor excluído com sucesso");
    }
}
