@extends('layout.main')

@section('content')

<section>
    <div class="d-flex justify-content-center align-items-center">
        <div class="bg-light rounded p-3" style="width: 500px;">
            <form action="{{route('book.update', ['book' => $book->id])}}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="title">Titulo do livro: </label>
                    <input type="text" name="title" id="title" value="{{old('title', $book->title)}}">
                </div>

                <div>
                    <label for="category">Categoria do livro: </label>
                    <input type="text" name="category" id="category" value="{{old('category', $book->category)}}">
                </div>

                <div>
                    <label for="published">Ano de publicação: </label>
                    <input type="text" name="published" id="published" value="{{old('published', $book->published)}}">
                </div>
                <br>
                <div>
                    <input type="submit" value="Editar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection