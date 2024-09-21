<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at')->get();
        return view('category.index', ['categories' => $categories]);
    }

    public function create(){
        return view('category.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        
        $categoryRequest->validated();
                
        $category = Category::create($categoryRequest->all());

        return redirect()->route('category.show', ['category' => $category->id])->with('sucess', "Cadastro realizado com sucesso");
    }

    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $categoryRequest->validated();
        
        $category->update([
            'name' => $categoryRequest->name
        ]);

        return redirect()->route('category.show', ['category' => $category->id])->with('sucess', "Edição realizada com sucesso");
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('sucess', "Categoria excluída com sucesso");
    }
}
