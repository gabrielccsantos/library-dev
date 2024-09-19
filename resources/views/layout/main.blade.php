<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Dev</title>
</head>

<body>
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
@yield('content')
<footer>
    <p>Library Dev</p>
</footer>
</body>
</html>