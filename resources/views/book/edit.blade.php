@extends('layout.main')

@section('content')

<section>
    <form action="{{route('book.update', ['bookModel' => $bookModel->id])}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titulo do livro: </label>
            <input type="text" name="title" id="title" value="{{old('title', $bookModel->title)}}">
        </div>

        <div>
            <label for="category">Categoria do livro: </label>
            <input type="text" name="category" id="category" value="{{old('category', $bookModel->category)}}">
        </div>

        <div>
            <label for="published">Ano de publicação: </label>
            <input type="text" name="published" id="published" value="{{old('published', $bookModel->published)}}">
        </div>

        <div>
            <input type="submit" value="Editar">
        </div>
    </form>
</section>
@endsection