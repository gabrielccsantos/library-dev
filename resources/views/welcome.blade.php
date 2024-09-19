@extends('layout.main')


@section('content')
<head>
    <h1>Seja Bem vindo a Library Dev</h1>
    <nav>
        <div>
            <a href="{{route('book.index')}}">Listar todos os livros</a>
        </div>
        <div>
            <a href="{{route('book.create')}}">Cadastrar um novo livro</a>
        </div>
    </nav>
</head>
@endsection