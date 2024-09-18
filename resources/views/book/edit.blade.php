<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <header>
        <h1>Editar livro</h1>
        <nav>
            <a href="{{route('book.index')}}">
                <button type="button">Listar todos os livros</button>
            </a>
            <a href="{{route('book.create')}}">
                <button type="button">Cadastrar um novo livro</button>
            </a>
        </nav>
    </header>

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
</body>
</html>