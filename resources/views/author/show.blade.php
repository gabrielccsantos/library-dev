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
            Nome do Autor: {{$author->name}} <br>
            <p>Autores:</p>
                @if($author->books->isEmpty())
                    <span>Sem autores atribuídos</span>
                @else
                    <ul>
                        @foreach($author->books as $book)
                            <li>{{ $book->title }}</li>
                        @endforeach
                    </ul>
                @endif
            </p>
            Data de Cadastro na livraria: {{$author->created_at->format('H:i:s d/m/Y')}}
            <br>
            <br>
            <div>
                <form action="{{route('author.destroy', ['author' => $author->id])}}" method="post">
                    <a href="{{route('author.edit', ['author' => $author->id])}}">
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