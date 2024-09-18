<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dev</title>
</head>
<body>
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
                <label for="book_title">Titulo do livro: </label>
                <input type="text" name="book_title" id="book_title">
            </div>

            <div>
                <label for="book_category">Titulo do livro: </label>
                <input type="text" name="book_category" id="book_category">
            </div>

            <div>
                <label for="book_published">Titulo do livro: </label>
                <input type="text" name="book_published" id="book_published">
            </div>

            <div>
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </section>
</body>
</html>