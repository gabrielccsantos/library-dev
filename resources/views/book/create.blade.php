@extends('layout.main')

@section('content')

<div>
    @if($errors->any())

    @foreach($errors->all() as $error)

    {{$error}} <br>

    @endforeach
    @endif
</div>

<section>
    <div class="d-flex justify-content-center align-items-center">

        <div class="bg-light rounded p-3 " style="width: 500px;">
            <form action="{{route('book.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title">Titulo do livro: </label>
                    <input type="text" name="title" id="title" value="{{old('title')}}">
                </div>

                <div class="mb-3">
                    <label for="published">Ano de publicação: </label>
                    <input type="text" name="published" id="published" value="{{old('published')}}">
                </div>

                <div class="mb-3">
                    <label for="category_id">Categoria: </label>
                    <select name="category_id" id="category_id" required>
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="authors">Autores:</label>
                    <select name="authors[]" id="authors" class="form-control" multiple>
                        @foreach($authors as $author)
                        <option name="authors[]" value="{{ $author->id }}" {{ collect(old('authors'))->contains($author->id) ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('authors')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                    <input type="reset" value="Limpar" class="btn btn-secondary">
                </div>

            </form>
        </div>
</section>

@endsection