@extends('layout.main')

@section('content')

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

@endsection