@extends('layout.main')

@section('content')
<header>
    <h1>Cadastre um novo livro</h1>
    <nav>
        <a href="{{route('book.index')}}">Listar</a>
    </nav>
</header>

<div>
    @if($errors->any())

    @foreach($errors->all() as $error)

    {{$error}} <br>

    @endforeach
    @endif
</div>

<section>
    <form action="{{route('book.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Titulo do livro: </label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="category">Categoria do livro: </label>
            <input type="text" name="category" id="category">
        </div>

        <div>
            <label for="published">Ano de publicação: </label>
            <input type="text" name="published" id="published">
        </div>

        <div>
            <input type="submit" value="Cadastrar">
        </div>
    </form>
</section>

@endsection