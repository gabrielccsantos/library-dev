<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dev</title>
</head>

<body>
    <header>
        <h1>Listagem de todos os livros</h1>
        <nav>
            <div>
                <a href="{{route('book.create')}}">Cadastrar um novo livro</a>
            </div>
        </nav>
    </header>
    <div>
        @if(session('sucess'))

        <span style="color: green;">
            {{session('sucess')}}
        </span>

        @endif
    </div>
    <section>
        @forelse($books as $book)
        <ul>
            <li>Titulo do livro: {{$book->title}}</li>
            <li>Categoria do livro: {{$book->category}}</li>
            <li>Ano de publicação: {{$book->published}}</li>
            <br>
            <div>
                <a href="{{route('book.edit', ['bookModel' => $book->id])}}">
                    <button type="button">Editar</button>
                </a>
                <form action="{{route('book.destroy', ['bookModel' => $book->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">Deletar</button>
                </form>
            </div>
            <hr>
        </ul>
        @empty
        <p style="color: red;">Lista está vazia. Cadastre um novo pet perdido</p>
        @endforelse
    </section>
</body>

</html>