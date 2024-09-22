@extends('layout.main')


@section('content')
<div>
    @if(session('sucess'))

    {{session('sucess')}}
    @endif
</div>

<section>
    <div class="d-flex justify-content-center align-items-center">
        <div class="bg-light rounded p-3" style="width: 500px;">
            Titulo do livro: {{$book->title}} <br>
            Ano de publicação: {{$book->published}} <br>
            Categoria do livro: {{$book->category->name}} <br>
            <p>Autores:</p>
                @if($book->authors->isEmpty())
                    <span>Sem autores atribuídos</span>
                @else
                    <ul>
                        @foreach($book->authors as $author)
                            <li>{{ $author->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>
            Data de Cadastro na livraria: {{$book->created_at->format('H:i:s d/m/Y')}}
            <br>
            <br>
            <div>
                <form action="{{route('book.destroy', ['book' => $book->id])}}" method="post">
                    <a href="{{route('book.edit', ['book' => $book->id])}}">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection