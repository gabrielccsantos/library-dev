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
            Categoria do livro: {{$book->category}} <br>
            Ano de publicação: {{$book->published}} <br>
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