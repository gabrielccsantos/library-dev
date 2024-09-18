<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        @if(session('sucess'))

        {{session('sucess')}}
        @endif
    </div>

    <section>
        Titulo do livro: {{$bookModel->title}} <br>
        Categoria do livro: {{$bookModel->category}} <br>
        Ano de publicação: {{$bookModel->published}}
    </section>
    <div>
        <a href="{{route('book.index')}}">Inicio</a> <br>
        <a href="{{route('book.create')}}">Cadastrar um novo livro</a> <br>
    </div>
</body>

</html>