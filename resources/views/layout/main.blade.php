<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Dev</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="container text-center bg-info">

    <head>
        <h1>Library Dev</h1>
        <nav class="navbar bg-info justify-content-center align-items-center" style="width: 1150px;">
            <div>

                <a href="{{route('category.index')}}">
                    <button type="button" class="btn btn-primary">Listar todas as categoria</button>
                </a>
                <a href="{{route('category.create')}}">
                    <button type="button" class="btn btn-primary">Cadastrar uma nova categoria</button>
                </a>
            </div>

            <div>

                <a href="{{route('author.index')}}">
                    <button type="button" class="btn btn-primary">Listar todos os autores</button>
                </a>
                <a href="{{route('author.create')}}">
                    <button type="button" class="btn btn-primary">Cadastrar um novo autor</button>
                </a>
            </div>

            <div>
                <a href="{{route('book.index')}}">
                    <button type="button" class="btn btn-primary">Listar todos os livros</button>
                </a>
                <a href="{{route('book.create')}}">
                    <button type="button" class="btn btn-primary">Cadastrar um novo livro</button>
                </a>
            </div>
        </nav>
    </head>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>